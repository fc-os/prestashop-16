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


namespace Payone\Forms\Frontend\Payment;

use Payone\Base\Registry;

class InvoiceSecure extends Base
{
    /**
     * Sets form data after submit
     *
     * @return void
     */
    public function setFormData()
    {
        parent::setFormData();
        $this->assignDate();
    }

    /**
     * Gets form data
     *
     * @return array
     */
    public function getFormData()
    {
        $aForm = array();
        if (\Tools::isSubmit('fcpayonesubmit')) {
            $aForm = parent::getFormData();
        }

        return $aForm;
    }

    /**
     * Assign date var to smarty
     */
    protected function assignDate()
    {
        $years = \Tools::dateYears();
        $months = \Tools::dateMonths();
        $days = \Tools::dateDays();
        $this->getSmarty()->assign(array(
            'aYears' => $years,
            'aMonth' => $months,
            'aDays' => $days,
        ));
    }
}
