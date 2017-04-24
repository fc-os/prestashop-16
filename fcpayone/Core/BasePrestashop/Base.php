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

class FcPayoneBase extends \PaymentModule
{

    /**
     * Module conctructer sets name and basic functions
     */
    public function __construct()
    {
        $this->name = 'fcpayone';
        $this->tab = 'payments_gateways';
        $this->version = '1.0.0';
        $this->author = 'FATCHIP GmbH';
        $this->need_instance = 0;
        #$this->module_key = 'd8c52a8f94d05bebfbd5848a138a33b7';
        $this->bootstrap = true;
        $this->is_eu_compatible = 1;
        $this->currencies = true;
        $this->currencies_mode = 'checkbox';
        parent::__construct();
        $this->secure_key = Tools::encrypt($this->name);
        $oTranslator = Registry::getTranslator();
        $this->displayName = 'PAYONE GmbH Connector';
        $this->description = 'PAYONE GmbH Connector for Prestashop';
        $this->confirmUninstall = $oTranslator->translate('FC_PAYONE_BACKEND_CONFIRM_UNINSTALL');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Returns helper
     *
     * @return \Payone\Helper\Helper
     */
    protected function fcGetPayoneHelper()
    {
        return Registry::getHelper();
    }
}
