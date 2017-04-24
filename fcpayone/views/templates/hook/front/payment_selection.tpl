{*
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
* @category  Payone
* @package   fcpayone
* @author    FATCHIP GmbH <support@fatchip.de>
* @copyright 2003 - 2017 Payone GmbH
* @license   <http://www.gnu.org/licenses/> GNU Lesser General Public License
* @link      http://www.payone.de
*}
{foreach from=$aFcPayonePaymentMethods item=oFcPayonePayment}
<div class="row">
    <div class="col-xs-12">
        <p class="payment_module">
            {if $oFcPayonePayment->isGroupedPayment()}
                {assign var=sFcPayonePaymentId value=$oFcPayonePayment->getParentId()}
                {assign var=sFcPayoneSubPaymentId value=$oFcPayonePayment->getId()}
            {else}
                {assign var=sFcPayonePaymentId value=$oFcPayonePayment->getId()}
                {assign var=sFcPayoneSubPaymentId value=false}
            {/if}
            <a href="{$link->getModuleLink($sFcPayoneModuleId, $oFcPayonePayment->getController(),['payone_payment' => $sFcPayonePaymentId,'payone_payment_sub' => $sFcPayoneSubPaymentId])|escape:'html'}" title="{$oFcPayonePayment->getTitle()}">
                {if $oFcPayonePayment->getImage()}<img src="{$oFcPayonePayment->getImage()}" alt="{$oFcPayonePayment->getTitle()}" width="86" height="49"/>{/if}
                {$oFcPayonePayment->getTitle()}
            </a>
        </p>
    </div>
</div>
{/foreach}


