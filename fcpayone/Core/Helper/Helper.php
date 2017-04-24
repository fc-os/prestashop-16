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

namespace Payone\Helper;

class Helper
{

    /**
     * Params that should be masked
     *
     * @var array
     */
    protected $aSensitiveParams = array(
        'key',
        'portalid'
    );

    /**
     * Returns module path
     *
     * @return string
     */
    public function getModulePath()
    {
        return _PS_MODULE_DIR_ . 'fcpayone/';
    }

    /**
     * Returns module core path
     *
     * @return string
     */
    public function getModuleCorePath()
    {
        return $this->getModulePath() . 'Core';
    }

    /**
     * Returns module url
     *
     * @return string
     */
    public static function getModuleUrl()
    {
        return \Tools::getShopDomainSsl(true, true) . __PS_BASE_URI__ . 'modules/fcpayone/';
    }

    /**
     * Returns amount converted for request
     *
     * @param float $dAmount
     * @return float
     */
    public function getConvertedAmount($dAmount)
    {
        return (number_format($dAmount, 2, '.', '') * 100);
    }

    /**
     * Returns array with params for masking
     *
     * @return array
     */
    protected function getSensitiveParams()
    {
        return $this->aSensitiveParams;
    }

    /**
     * Cleans request for save
     *
     * @param array $aData
     * @return array
     */
    public function cleanData($aData)
    {
        foreach ($this->getSensitiveParams() as $sParam => $sValue) {
            if (isset($aData[$sParam])) {
                $aData[$sParam] = md5($sValue);
            }
        }

        return $aData;
    }


    /**
     * Build module url
     *
     * @param string $sController
     * @param array $aParams
     */
    public function buildModuleUrl($sController, $aParams)
    {
        return \Context::getContext()->link->getModuleLink('fcpayone', $sController, $aParams);
    }
}