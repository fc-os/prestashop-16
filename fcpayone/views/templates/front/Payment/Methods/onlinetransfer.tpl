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
{capture name=path}{$oFcPayonePayment->getTitle()}{/capture}
<div class="box js-payone-validate" data-payone-validation-url="{$sFcPayoneValidationUrl}" data-payone-payment-id="{$oFcPayonePayment->getId()}">
    <fieldset>
        <h3 class="page-subheading">{$oFcPayonePayment->getTitle()}</h3>
        {if $oFcPayonePayment->getDescription()}
        <p><strong class="dark">{$oFcPayonePayment->getDescription()}</strong></p>
        {/if}
        <p>
            {$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_PAYMENT_ORDER_AMOUNT')}
            <span class="price">{convertPrice price=$total}</span>
            {if $use_taxes == 1}
                {$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_PAYMENT_ORDER_AMOUNT_TAX')}
            {/if}
        </p>
        <div class="form-group required">
            <label for="ottype" class="control-label col-lg-4">{$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ONLINETRANSFER_TYPE')} <sup>*</sup></label>
            <div class="col-lg-5">
                <select id="ottype" name="payone_payment_sub" class="form-control js-ot-type">
                    {foreach from=$aFcPayoneSubPayments item=oSubPayment}
                    <option value="{$oSubPayment->getId()}" 
                            data-show-ibanbic="{if $oSubPayment->hasIbanBic()}true{/if}"
                            data-show-bankgroup="{if $oSubPayment->getBankGroups()}true{/if}" 
                            data-payment-id="{$oSubPayment->getId()}" 
                            {if isset($fcpayone_form.payone_payment_sub) && $fcpayone_form.payone_payment_sub == $oSubPayment->getId()}selected{/if}>{$oSubPayment->getTitle()}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        {foreach from=$aFcPayoneSubPayments item=oSubPayment}
        {if $oSubPayment->getBankGroups()}
        <div class="form-group required js-payment-bankgroup" data-payment-id="{$oSubPayment->getId()}">
            <label for="bankgrouptype" class="control-label col-lg-4">{$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ONLINETRANSFER_BANK_GROUP')} <sup>*</sup></label>
            <div class="col-lg-5">
                <select id="bankgrouptype" name="fcpayone_form[bankgrouptype_{$oSubPayment->getId()}]" class="form-control">
                    {foreach from=$oSubPayment->getBankGroups() key=sBankGroupValue item=sBankGroupTitle}
                    <option value="{$sBankGroupValue}">{$sBankGroupTitle}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        {/if}
        {/foreach}

        <div class="js-payment-ibanbic">
            <div class="form-group required">
                <label for="iban" class="control-label col-lg-4">{$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_IBAN')} <sup>*</sup></label>
                <div class="col-lg-5">
                    <input id="iban" class="form-control" type="text" name="fcpayone_form[iban]" maxlength="35" value="{if isset($fcpayone_form.iban)}{$fcpayone_form.iban}{/if}" />
                </div>
            </div>
            <div class="form-group required">
                <label for="bic" class="control-label col-lg-4">{$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_BIC')} <sup>*</sup></label>
                <div class="col-lg-5">
                    <input id="bic" class="form-control" type="text" name="fcpayone_form[bic]" maxlength="11" value="{if isset($fcpayone_form.bic)}{$fcpayone_form.bic}{/if}" />
                </div>
            </div>
        </div>
    </fieldset>
</div>