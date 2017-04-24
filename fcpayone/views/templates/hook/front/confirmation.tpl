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

{if isset($blFcPayoneError) && $blFcPayoneError}
    <div class="alert alert-danger">
        <p>{$oFcPayoneTranslator->translate('FC_PAYONE_ERROR_ORDER_CONFIRM')}</p>
    </div>
{/if}
<p>
    {$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ORDER_CONFIRM')}<br/><br/>
    {$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ORDER_CONFIRM_REFERENCE')} {$sFcPayoneOrderReference}
    <br/><br/>
    {$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ORDER_CONFIRM_CONTACT')}
    <a href="{$link->getPageLink('contact-form', true)|escape:'html'}">{$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ORDER_CONFIRM_CONTACT_LINK')}</a>
</p>
{if isset($sFcPayoneDownloadLink)}
    <p>
        <a href="{$sFcPayoneDownloadLink|escape:'htmlall':'UTF-8'}" target="_blank">
            {$oFcPayoneTranslator->translate('FC_PAYONE_FRONTEND_ORDER_CONFIRM_DOWNLOAD_PDF')}<br/><br/>
        </a>
    </p>
{/if}