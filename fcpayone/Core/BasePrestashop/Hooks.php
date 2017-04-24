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

use \Payone\Base\Registry;

class FcPayoneHooks extends \FcPayoneSetup
{

    /**
     * Module conctructer sets name and basic functions
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Diaplay the payone panel in admin order area to change the status...
     *
     * @param array $params
     * @return string
     */
    public function hookDisplayAdminOrderLeft($params)
    {
        $oOrder = new Order($params['id_order']);
        if ($oOrder->module !== $this->name) {
            Registry::getErrorHandler()->setError('order', 'FC_PAYONE_ERROR_ORDER_FAIL');
            return;
        }
        $oOrderForm = new \Payone\Forms\Backend\Order;
        $oOrderForm->setModule($this);
        $oOrderForm->setOrder($oOrder);
        $oOrderForm->setContext($this->context);
        return $oOrderForm->getForm();
    }

    /**
     * Checks if payment can be hoocked
     *
     * @param array $params
     * @return boolean
     */
    protected function fcPayoneCanHookPayment($params)
    {
        if (!$this->active || !$params || !isset($params['cart'])) {
            return false;
        }

        $oValidation = new \Payone\Validation\Validation;
        $oCart = $params['cart'];

        $oCurrency = new \Currency($oCart->id_currency);
        $aCurrenciesModule = $this->getCurrency($oCart->id_currency);
        if (!$oValidation->validateCurrency($oCurrency, $aCurrenciesModule)) {
            return false;
        }
        return true;
    }

    /**
     * Returns payment methods that are valid to display for the current user
     *
     * @return array
     */
    protected function fcPayoneGetValidUserPaymentMethods()
    {
        //reset worker order id
        if (isset(\Context::getContext()->cookie->sFcPayoneWorkOrderId)) {
            unset(\Context::getContext()->cookie->sFcPayoneWorkOrderId);
        }
        if (isset(Context::getContext()->cookie->iFcPayoneTransactionId)) {
            unset(Context::getContext()->cookie->iFcPayoneTransactionId);
        }

        $aNotVisibleInList = array('wallet_paypal_express');
        $aValidPaymentMethods = array();
        $aPaymentMethods = Registry::getPayment()->getPaymentMethods();
        foreach ($aPaymentMethods as $sKey => $oPayment) {
            if (!$oPayment->isGroupedPayment() && !in_array($oPayment->getId(), $aNotVisibleInList) &&
                (($oPayment->hasSubPayments() && count($oPayment->getValidSubPayments()) > 0) ||
                    (!$oPayment->hasSubPayments() && $oPayment->isValidForCheckout()))
            ) {
                $aValidPaymentMethods[$sKey] = $oPayment;
            }
        }

        foreach ($aPaymentMethods as $sKey => $oPayment) {
            if ($oPayment->isGroupedPayment()) {
                $aSubPayments = $oPayment->getValidSubPayments();
                foreach ($aSubPayments as $sSubKey => $oSubPayment) {
                    if (!in_array($oSubPayment->getId(), $aNotVisibleInList)) {
                        $aValidPaymentMethods[$sSubKey] = $oSubPayment;
                    }
                }
            }
        }

        return $aValidPaymentMethods;
    }

    /**
     * Hook payment to show paymethod
     * checks if currency is allowed
     *
     * @param array $params
     * @return boolean|string
     */
    public function hookPayment($params)
    {
        if (!$this->fcPayoneCanHookPayment($params)) {
            return false;
        }
        Registry::getLog()->log('hook payment', 1, array(null, 'Payment', $params['cart']->id));
        $this->fcPayoneAddDefaultTemplateVars();
        $aPaymentMethods = $this->fcPayoneGetValidUserPaymentMethods();
        if (is_array($aPaymentMethods) && count($aPaymentMethods) > 0) {
            $this->smarty->assign('aFcPayonePaymentMethods', $aPaymentMethods);
        } else {
            return false;
        }

        return $this->display(
            $this->fcGetPayoneHelper()->getModulePath(),
            'views/templates/hook/front/payment_selection.tpl'
        );
    }

    /**
     * Hook payment to show paymethod
     * checks if currency is allowed
     * EU compat mode
     *
     * @param array $params
     * @return string
     */
    public function hookDisplayPaymentEU($params)
    {
        if (!$this->fcPayoneCanHookPayment($params)) {
            return;
        }
        Registry::getLog()->log('hook payment', 1, array(null, 'Payment', $params['cart']->id));
        $this->fcPayoneAddDefaultTemplateVars();

        return $this->fcPayoneGetPaymentsForTemplate();
    }

    /**
     * Returns array with payment methdos shown in template
     *
     * @return array
     */
    protected function fcPayoneGetPaymentsForTemplate()
    {
        $aReturn = array();
        $aPaymentMethods = $this->fcPayoneGetValidUserPaymentMethods();
        if (!is_array($aPaymentMethods) || count($aPaymentMethods) == 0) {
            return $aReturn;
        }
        foreach ($aPaymentMethods as $oPayment) {
            if ($oPayment->isGroupedPayment()) {
                $aControllerParams = array(
                    'payone_payment' => \Tools::strtolower(\Tools::strtoupper($oPayment->getParentId())),
                    'payone_payment_sub' => \Tools::strtolower($oPayment->getId())
                );
            } else {
                $aControllerParams = array(
                    'payone_payment' => \Tools::strtolower($oPayment->getId()),
                );
            }

            $aReturn[] = array(
                'cta_text' => $oPayment->getTitle(),
                'logo' => \Media::getMediaPath(
                    $this->fcGetPayoneHelper()->getModulePath() . '/views/image/paymentmethods/' . $oPayment->getImage()
                ),
                'action' => $this->context->link->getModuleLink(
                    $this->name,
                    $oPayment->getController(),
                    $aControllerParams,
                    true
                )
            );
        }

        return $aReturn;
    }

    /**
     * Adds mandate download link to template
     *
     * @param $iOrderId
     * @param $iCustomerId
     */
    public function fcPayoneAddMandateDownloadLink($iOrderId, $iCustomerId)
    {
        $sTable = _DB_PREFIX_ . \Payone\Base\Mandate::getTable();
        $iCleanOrderId = (int)\pSQL($iOrderId);
        $sQ = "select mandate_identifier from $sTable where id_order = '{$iCleanOrderId}'";
        $sMandateIdentifier = Db::getInstance()->getValue($sQ);

        $this->context->smarty->assign(
            array(
                'sFcPayoneDownloadLink' => $this->context->link->getModuleLink(
                    $this->name,
                    'download',
                    array(
                        'payone_orderid' => $iOrderId,
                        'payone_ident' => $sMandateIdentifier,
                        'payone_customer' => $iCustomerId
                    )
                ),
            )
        );
    }

    /**
     * frontend order overview after payment and validation
     *
     * @param array $params
     * @return string
     */
    public function hookPaymentReturn($params)
    {
        if (!$this->active) {
            return;
        }
        $oOrder = $params['objOrder'];
        Registry::getLog()->log('hook payment return', 1, array(null, 'Order', $oOrder->id));

        $this->fcPayoneCleanup();
        if (\Tools::getValue('payone_payment') == 'debit') {
            $this->fcPayoneAddMandateDownloadLink($oOrder->id, $oOrder->id_customer);
        }
        $blError = false;
        if ($oOrder->getCurrentOrderState()->id == Configuration::get('PS_OS_ERROR')) {
            $blError = true;
        }

        $this->smarty->assign(
            array(
                'iFcPayoneOrderId' => $oOrder->id,
                'sFcPayoneOrderReference' => $oOrder->reference,
                'blFcPayoneError' => $blError
            )
        );
        $this->fcPayoneAddDefaultTemplateVars();
        return $this->display(
            $this->fcGetPayoneHelper()->getModulePath(),
            'views/templates/hook/front/confirmation.tpl'
        );
    }

    /**
     * Cleanup after order is completed
     */
    protected function fcPayoneCleanup()
    {
        if (isset(\Context::getContext()->cookie->sFcPayoneMandate)) {
            unset(\Context::getContext()->cookie->sFcPayoneMandate);
        }
        Registry::getErrorHandler()->deleteErrors();
    }

    /**
     * Add paypal express template to hook
     *
     * @param array
     *
     * @return void|string
     */
    public function hookDisplayShoppingCart($params)
    {
        $sCartId = null;
        if ($params && isset($params['cart']) && $params['cart']->id) {
            $sCartId = $params['cart']->id;
        }

        Registry::getLog()->log('hook display shoppingcart', 1, array(null, 'Cart', $sCartId));
        $aPaymentMethods = Registry::getPayment()->getPaymentMethods();
        $oPayPalExpress = null;
        if (is_array($aPaymentMethods) && count($aPaymentMethods) > 0) {
            foreach ($aPaymentMethods as $oPayment) {
                if ($oPayment->getId() == 'wallet') {
                    $aSubPayments = $oPayment->getValidSubPayments();
                    if ($aSubPayments && isset($aSubPayments['wallet_paypal_express'])) {
                        $oPayPalExpress = $aSubPayments['wallet_paypal_express'];
                    }
                }
            }
        }

        if (isset(\Context::getContext()->cookie->sFcPayoneWorkOrderId)) {
            unset(\Context::getContext()->cookie->sFcPayoneWorkOrderId);
        }

        if (!$oPayPalExpress) {
            return;
        }
        $this->context->controller->addCSS(
            $this->fcGetPayoneHelper()->getModulePath() . 'views/css/paypal_express_btn_cart.css',
            'all'
        );

        $this->fcPayoneAddDefaultTemplateVars();

        $this->smarty->assign(
            array(
                'oFcPayPalExpress' => $oPayPalExpress,
            )
        );
        return $this->display(
            $this->fcGetPayoneHelper()->getModulePath(),
            $oPayPalExpress->getPayPalExpressTemplate('cart')
        );
    }

    /**
     * Adds default vars to template like url, path....
     *
     * @param object $oContent
     */
    public function fcPayoneAddDefaultTemplateVars($oContent = null)
    {
        if (!$oContent) {
            $oContent = $this->context;
        }
        $oContent->smarty->assign(array(
            'sFcPayoneModulePath' => $this->fcGetPayoneHelper()->getModulePath(),
            'sFcPayoneModuleUrl' => $this->fcGetPayoneHelper()->getModuleUrl(),
            'sFcPayoneModuleId' => $this->name,
            'oFcPayoneTranslator' => Registry::getTranslator(),
        ));
    }
}
