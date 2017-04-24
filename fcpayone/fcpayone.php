<?php

/**
 * PAYONE Prestashop Connector is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PAYONE Prestashop Connector is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with PAYONE Prestashop Connector. If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @author    FATCHIP GmbH <support@fatchip.de>
 * @copyright 2003 - 2017 Payone GmbH
 * @license   <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link      http://www.payone.de
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_MODULE_DIR_ . 'fcpayone/Core/autoload.php';

class FcPayone extends \FcPayoneHooks
{

    /**
     * Ident from form submit
     * @var string
     */
    protected $sFcPayoneSubmitIdent = null;

    /**
     * Load the configuration form
     *
     * @return string
     */
    public function getContent()
    {
        $this->fcPayoneAddDefaultTemplateVars();
        $aFormLists = $this->fcPayoneGetConfigurationForms();
        $this->fcPayonePostProcess($aFormLists);
        $aForms = array();
        $sFormSubmitIdent = $this->fcPayoneGetSubmitIdent();
        $sActiveFormType = 'general';
        foreach ($aFormLists as $sFormType => $aFormList) {
            $i = 0;
            foreach ($aFormList as $oForm) {
                $blActive = false;
                if ($sFormSubmitIdent && $sFormSubmitIdent == $oForm->getSubmitName()) {
                    $blActive = true;
                    $sActiveFormType = $sFormType;
                } elseif (!$sFormSubmitIdent && $sFormType == 'general' && $i == 0) {
                    $blActive = true;
                }
                $aForms[$sFormType][] = array(
                    'title' => $oForm->getTitle(),
                    'content' => $this->fcPayoneBuildForm($oForm->getForm(), $oForm->getValues($oForm->getFields()),
                        $oForm->getSubmitName()),
                    'active' => $blActive,
                );
                $i++;
            }
        }

        $this->context->smarty->assign('sFcPayoneLogo', $this->fcGetPayoneHelper()->getModuleUrl() . 'views/img/PAYONE_Logo_RGB.jpg');
        $sContent = $this->context->smarty->fetch($this->fcGetPayoneHelper()->getModulePath() . 'views/templates/admin/info.tpl');
        $this->context->smarty->assign('sFcPayoneActiveFormType', $sActiveFormType);
        $this->context->smarty->assign('aFcPayoneForms', $aForms);
        $sContent .= $this->context->smarty->fetch($this->fcGetPayoneHelper()->getModulePath() . 'views/templates/admin/configuration.tpl');
        return $sContent;
    }

    /**
     * Returns configuration forms
     *
     * @return array
     */
    protected function fcPayoneGetConfigurationForms() {
        $oForm = new \Payone\Forms\Backend\Backend();
        $oForm->setContext($this->context);
        $oForm->setModule($this);
        return $oForm->getConfigurationForms();
    }

    /**
     * Build forms
     *
     * @param $aForm
     * @param $aValues
     * @param $sSubmitName
     * @return mixed
     */
    protected function fcPayoneBuildForm($aForm, $aValues, $sSubmitName)
    {
        $helper = new \HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = \Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = $sSubmitName;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = \Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $aValues, /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        return $helper->generateForm(
            array($aForm)
        );

    }

    /**
     * Save form data.
     *
     * @param $aForms
     * @return void
     */
    protected function fcPayonePostProcess($aForms)
    {
        foreach ($aForms as $aFormTypes) {
            foreach ($aFormTypes as $oForm) {
                if (((bool)Tools::isSubmit($oForm->getSubmitName())) == true) {
                    $this->fcPayoneSetSubmitIdent($oForm->getSubmitName());
                    $aFields = $oForm->getFields();
                    foreach ($aFields as $sKey) {
                        $oForm->handleUpdate($sKey);
                    }
                }
            }
        }
    }

    /**
     * Returns form submit Ident
     *
     * @return string
     */
    protected function fcPayoneGetSubmitIdent()
    {
        return $this->sFcPayoneSubmitIdent;
    }

    /**
     * Sets form submit Ident for active flag
     *
     * @param string
     */
    protected function fcPayoneSetSubmitIdent($sIdent)
    {
        $this->sFcPayoneSubmitIdent = $sIdent;
    }
}