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

use Payone\Base\Registry;

class FcPayoneSetup extends \FcPayoneBase
{
    /**
     * Triggers install and creates database
     *
     * @return boolean
     */
    public function install()
    {
        if (extension_loaded('curl') == false) {
            $this->_errors[] = Registry::getTranslator()->translate('FC_PAYONE_ERROR_CURL_NEEDED');
            return false;
        }

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        return parent::install() &&
            $this->registerHook('payment') &&
            $this->registerHook('displayPaymentEU') &&
            $this->registerHook('paymentReturn') &&
            $this->registerHook('displayAdminOrderLeft') &&
            $this->registerHook('displayShoppingCart') &&
            $this->fcPayoneCreateTables() &&
            $this->fcPayoneAddDefaultConfiguration();
    }

    /**
     * Triggers uninstall and removes database and config entrys
     *
     * @return boolean
     */
    public function uninstall()
    {

        if (!$this->fcPayoneDeleteTables()) {
            return false;
        }

        $oBackendForms = new \Payone\Forms\Backend\Backend;
        $aBackendForms = $oBackendForms->getConfigurationForms();
        $aConfigFields = array();
        foreach ($aBackendForms as $aFormTypes) {
            foreach ($aFormTypes as $oForm) {
                $aConfigFields = array_merge($aConfigFields, $oForm->getFields());
            }
        }

        $aConfigFields = array_merge($aConfigFields, $this->fcPayoneGetConfigurationsToRemove());

        foreach ($aConfigFields as $sConfigKey) {
            //delete config params
            \Configuration::deleteByName(str_replace('[]', '', $sConfigKey));
        }

        return parent::uninstall();
    }

    /**
     * Returns array with payone tables
     *
     * @return array
     */
    protected function fcPayoneGetTables()
    {
        return array(
            '###TABLE_REQUEST###' => _DB_PREFIX_ . \Payone\Request\Request::getTable(),
            '###TABLE_TRANSACTION###' => _DB_PREFIX_ . \Payone\Base\Transaction::getTable(),
            '###TABLE_USER###' => _DB_PREFIX_ . \Payone\Base\User::getTable(),
            '###TABLE_MANDATE###' => _DB_PREFIX_ . \Payone\Base\Mandate::getTable(),
            '###TABLE_REFERENCE###' => _DB_PREFIX_ . \Payone\Base\Reference::getTable(),
            '###TABLE_ORDER###' => _DB_PREFIX_ . \Payone\Base\Order::getTable(),
        );
    }

    /**
     * Creates payone tables
     *
     * @return boolean
     */
    protected function fcPayoneCreateTables()
    {
        $sRawQ = \Tools::file_get_contents(Registry::getHelper()->getModulePath() . '/sql/install.sql');
        $aTables = $this->fcPayoneGetTables();
        $aPattern = array_keys($aTables);
        $aPattern[] = '###TABLE_ENGINE###';
        $aReplace = $aTables;
        $aReplace[] = _MYSQL_ENGINE_;

        $sQ = str_replace($aPattern, $aReplace, $sRawQ);
        if (\Db::getInstance()->execute($sQ) == false) {
            return false;
        }
        return true;
    }

    /**
     * Drops payone tables on uninstall
     *
     * @return boolean
     */
    protected function fcPayoneDeleteTables()
    {
        $aTables = $this->fcPayoneGetTables();
        $sQ = '';
        foreach ($aTables as $sTable) {
            $sQ .= 'DROP TABLE IF EXISTS `' . $sTable . '`;';
        }
        return (bool)\Db::getInstance()->execute($sQ);
    }

    /**
     * Adds default configuration values
     */
    protected function fcPayoneAddDefaultConfiguration()
    {
        //special value, is not set with normal generic configuration value handling
        \Configuration::updateValue('FC_PAYONE_PAYPAL_EXPRESS_IMG_1', 'paypal_express_1.png');

        //set default
        \Configuration::updateValue('FC_PAYONE_PAYMENT_SHOW_IBANBIC_ONLINETRANSFER_SOFORTBANKING', '1');
        return true;
    }

    /**
     * Returns configurations to delete
     */
    protected function fcPayoneGetConfigurationsToRemove()
    {
        return array('FC_PAYONE_PAYPAL_EXPRESS_IMG_1');
    }
}
