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

namespace Payone\Translation;

/**
 * Lang files with all idents
 * for tricking prestashop lang parser
 */

$aLang = array(

#error
    "->l('FC_PAYONE_ERROR_PAYMENT_EXECUTION_FAILED')",
    "->l('FC_PAYONE_ERROR_MODULE_NOT_VALID')",
    "->l('FC_PAYONE_ERROR_MODULE_NOT_ACTIVE')",
    "->l('FC_PAYONE_ERROR_ORDERSTATE_INVALID')",
    "->l('FC_PAYONE_ERROR_ORDER_ALREADY_EXISTS')",
    "->l('FC_PAYONE_ERROR_SECUREKEY_INVALID')",
    "->l('FC_PAYONE_ERROR_CARTRULE_INVALID')",
    "->l('FC_PAYONE_ERROR_COUNTRY_INVALID')",
    "->l('FC_PAYONE_ERROR_MANDATE_NOT_ACCEPTED')",
    "->l('FC_PAYONE_ERROR_MANDATE_FAILED')",
    "->l('FC_PAYONE_ERROR_TERMS_NOT_ACCEPTED')",
    "->l('FC_PAYONE_ERROR_MANDATE_REQUEST_FAILED')",
    "->l('FC_PAYONE_ERROR_MANDATE_FILE_REQUEST_FAILED')",
    "->l('FC_PAYONE_ERROR_PAYPAL_EXPRESS_FAILED')",
    "->l('FC_PAYONE_ERROR_PAYPAL_EXPRESS_REQUEST_FAILED')",
    "->l('FC_PAYONE_ERROR_CURL_NEEDED')",
    "->l('FC_PAYONE_ERROR_ORDER_PAYMENT_PAYPAL_NO_USER_FOUND')",
    "->l('FC_PAYONE_ERROR_ORDER_PAYMENT_PAYPAL_NO_ADDRESS_FOUND')",
    "->l('FC_PAYONE_ERROR_USER_AGENT')",
    "->l('FC_PAYONE_ERROR_TOKEN')",
    "->l('FC_PAYONE_ERROR_NO_VALID_CART')",
    "->l('FC_PAYONE_ERROR_NO_PAYMENT_SELECTED')",
    "->l('FC_PAYONE_ERROR_NO_USER_FOUND')",
    "->l('FC_PAYONE_ERROR_PAYMENT_NOT_USABLE')",
    "->l('FC_PAYONE_ERROR_IBAN_INVALID')",
    "->l('FC_PAYONE_ERROR_BIC_INVALID')",
    "->l('FC_PAYONE_ERROR_CREDITCARD_INVALID')",
    "->l('FC_PAYONE_ERROR_BANKACCOUNT_INVALID')",
    "->l('FC_PAYONE_ERROR_BANKCODE_INVALID')",
    "->l('FC_PAYONE_ERROR_BANKACCOUNTHOLDER_INVALID')",
    "->l('FC_PAYONE_ERROR_MANDATE_NOT_ACCEPTED')",
    "->l('FC_PAYONE_ERROR_NO_REQUEST')",
    "->l('FC_PAYONE_ERROR_MISSING_CREDENTIALS')",
    "->l('FC_PAYONE_ERROR_FILL_FIELDS')",
    "->l('FC_PAYONE_ERROR_CREDITCARD_EXPIRE_INVALID')",
    "->l('FC_PAYONE_ERROR_ORDER_CONFIRM')",
    "->l('FC_PAYONE_ERROR_COULD_NOT_DOWNLOAD_MANDATE_PDF')",
    "->l('FC_PAYONE_ERROR_ORDER_ACTION_AMOUNT_NOT_VALID')",
    "->l('FC_PAYONE_ERROR_ORDER_NO_DATA_FOUND')",
    "->l('FC_PAYONE_ERROR_VIRTUAL_CART_NEEDS_EMAIL')",

#backend
    "->l('FC_PAYONE_BACKEND_CONFIRM_UNINSTALL')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_REQUEST_TYPE_PREAUTHORIZATION')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_REQUEST_TYPE_AUTHORIZATION')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_ACTIVE')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_MODE_LIVE')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_COUNTRY_DESC')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_COUNTRY')",
    "->l('FC_PAYONE_BACKEND_SAVE')",
    "->l('FC_PAYONE_BACKEND_TITLE_CONNECTION')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_MODE_LIVE')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_MERCHANTID_DESC')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_MERCHANTID')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_PORTALID_DESC')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_PORTALID')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_PORTALKEY_DESC')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_PORTALKEY')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_SUBID_DESC')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_SUBID')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_REF_PREFIX_DESC')",
    "->l('FC_PAYONE_BACKEND_CONNECTION_REF_PREFIX')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_REQUEST_TYPE_DESC')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_REQUEST_TYPE')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_APPOINTED')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_CAPTURE')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_PAID')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_UNDERPAID')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_CANCELATION')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_REFUND')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_DEBIT')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_REMINDER')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_VAUTHORIZATION')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_VSETTLEMENT')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_TRANSFER')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_TRANSACTION_MAPPING_INVOICE')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_SHOW_BANKACCOUNT_DESC')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_SHOW_BANKACCOUNT')",
    "->l('FC_PAYONE_BACKEND_PAYPAL_EXPRESS_IMG_DESC')",
    "->l('FC_PAYONE_BACKEND_PAYPAL_EXPRESS_IMG')",
    "->l('FC_PAYONE_BACKEND_UPLOAD_CHOOSE_FILE')",
    "->l('FC_PAYONE_BACKEND_CONFIGURATION_TITLE_SETTINGS')",
    "->l('FC_PAYONE_BACKEND_CONFIGURATION_TITLE_GENERAL')",
    "->l('FC_PAYONE_BACKEND_CONFIGURATION_TITLE_CREDITCARD')",
    "->l('FC_PAYONE_BACKEND_CONFIGURATION_TITLE_ONLINETRANSFER')",
    "->l('FC_PAYONE_BACKEND_ORDER_PANEL_TITLE')",
    "->l('FC_PAYONE_BACKEND_ORDER_INFO')",
    "->l('FC_PAYONE_BACKEND_ORDER_ACTION')",
    "->l('FC_PAYONE_BACKEND_ORDER_TXID')",
    "->l('FC_PAYONE_BACKEND_ORDER_USERID')",
    "->l('FC_PAYONE_BACKEND_ORDER_REFERENCE')",
    "->l('FC_PAYONE_BACKEND_ORDER_DOWNLOAD_PDF')",
    "->l('FC_PAYONE_BACKEND_ORDER_DOWNLOAD')",
    "->l('FC_PAYONE_BACKEND_ORDER_IBAN')",
    "->l('FC_PAYONE_BACKEND_ORDER_BIC')",
    "->l('FC_PAYONE_BACKEND_ORDER_CARD_EXPIRE')",
    "->l('FC_PAYONE_BACKEND_ORDER_CARD_TYPE')",
    "->l('FC_PAYONE_BACKEND_ORDER_CARD_PAN')",
    "->l('FC_PAYONE_BACKEND_ORDER_LAST_REQUEST')",
    "->l('FC_PAYONE_BACKEND_ORDER_REQUEST_ERROR')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTIONS')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_DATE')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_RECEIVABLE')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_BALANCE')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_DETAILS')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_PARAM')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_VALUE')",
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_END_BALANCE')",
    "->l('FC_PAYONE_BACKEND_ORDER_CAPTURE_CONFIRM')",
    "->l('FC_PAYONE_BACKEND_ORDER_PREAUTHORIZED_AMOUNT')",
    "->l('FC_PAYONE_BACKEND_ORDER_AMOUNT')",
    "->l('FC_PAYONE_BACKEND_ORDER_SETTLEACCOUNT')",
    "->l('FC_PAYONE_BACKEND_ORDER_ACTION_EXECUTE')",
    "->l('FC_PAYONE_BACKEND_ORDER_ACTION_SHOW_BANKDATA')",
    "->l('FC_PAYONE_BACKEND_ORDER_BANKCOUNTRY')",
    "->l('FC_PAYONE_BACKEND_ORDER_BANKACCOUNT')",
    "->l('FC_PAYONE_BACKEND_ORDER_BANKCODE')",
    "->l('FC_PAYONE_BACKEND_ORDER_BANKACCOUNTHOLDER')",
    "->l('FC_PAYONE_BACKEND_ORDER_ACTION_EXECUTE')",
    "->l('FC_PAYONE_BACKEND_TITLE_MISC')",
    "->l('FC_PAYONE_BACKEND_MISC_SEND_BASKET_DESC')",
    "->l('FC_PAYONE_BACKEND_MISC_SEND_BASKET')",
    "->l('FC_PAYONE_BACKEND_TITLE_TRANSACTIONFORWARDING')",
    "->l('FC_PAYONE_BACKEND_TRANSACTION_FORWARDING_DESC')",
    "->l('FC_PAYONE_BACKEND_INFO_PAYONE_DESC')",
    "->l('FC_PAYONE_BACKEND_TITLE_CREDITCARDGENERAL')",
    "->l('FC_PAYONE_BACKEND_CREDITCARD_GENERAL_SHOW_CVC')",
    "->l('FC_PAYONE_BACKEND_CREDITCARD_GENERAL_SHOW_CVC_DESC')",
    "->l('FC_PAYONE_BACKEND_CONFIGURATION_TITLE_WALLET')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_SHOW_IBANBIC')",
    "->l('FC_PAYONE_BACKEND_PAYMENT_SHOW_BIC')",
   # "->l('FC_PAYONE_BACKEND_INFO_PAYONE_BUTTON')",

    #rec
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_CAPTURE')", #Forderung(Capture)
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_CANCELATION')", #Ruecklastschriftgebuehr
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_APPOINTED_1')", #Reservierung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_APPOINTED_2')", #Forderung (Autorisierung)
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_REMINDER')", #Mahnungsversand
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_DEBIT_1')", #Forderung (Debit)
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_REC_DEBIT_2')", #Gutschrift (Debit/Refund)

    #payment
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_CAPTURE_1')", #Einzug
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_CAPTURE_2')", #Auszahlung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_PAID_1')", #Zahlungseingang
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_PAID_2')", #Rueckbelastung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_CANCLEATION_1')", #Zahlungseingang
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_CANCELATION_2')", #Rueckbelastung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_UNDERPAID_1')", #Unterzahlung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_UNDERPAID_2')", #Rueckbelastung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_DEBIT_1')", #Einzug
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_DEBIT_2')", #Auszahlung
    "->l('FC_PAYONE_BACKEND_ORDER_TRANSACTION_ACTION_PAY_TRANSFER')", #Umbuchung

#payments
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_AMEX')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_CARTEBLEUE')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_DINERS')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_DISCOVER')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_JCB')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_MAESTRO_INTERNATIONAL')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_MAESTRO_UK')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_MASTERCARD')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CREDITCARD_VISA')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_EPS')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_GIROPAY')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_IDEAL')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_POSTFINANCE_CARD')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_POSTFINANCE_EFINANCE')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_PRZELEWY24')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ONLINETRANSFER_SOFORTBANKING')",
    "->l('FC_PAYONE_PAYMENT_TITLE_ADVANCEPAYMENT')",
    "->l('FC_PAYONE_PAYMENT_TITLE_CASHONDELIVERY')",
    "->l('FC_PAYONE_PAYMENT_TITLE_DEBIT')",
    "->l('FC_PAYONE_PAYMENT_TITLE_INVOICE')",
    "->l('FC_PAYONE_PAYMENT_TITLE_WALLET_PAYPAL')",
    "->l('FC_PAYONE_PAYMENT_TITLE_WALLET_PAYPAL_EXPRESS')",
    "->l('FC_PAYONE_PAYMENT_TITLE_WALLET_PAYDIREKT')",
    "->l('FC_PAYONE_PAYMENT_TITLE_WALLET_ALIPAY')",

#frontend
    "->l('FC_PAYONE_FRONTEND_BREADCRUMB_CHECKOUT')",
    "->l('FC_PAYONE_FRONTEND_CART_EMPTY')",
    "->l('FC_PAYONE_FRONTEND_TERMS_TITLE')",
    "->l('FC_PAYONE_FRONTEND_TERMS_I_AGREE')",
    "->l('FC_PAYONE_FRONTEND_TERMS_READ')",
    "->l('FC_PAYONE_FRONTEND_CHOOSE_OTHER_PAYMENT')",
    "->l('FC_PAYONE_FRONTEND_CONTINUE')",
    "->l('FC_PAYONE_FRONTEND_COMPLETE_ORDER')",
    "->l('FC_PAYONE_FRONTEND_CREDITCARD_TYPE')",
    "->l('FC_PAYONE_FRONTEND_CREDITCARD_PAN')",
    "->l('FC_PAYONE_FRONTEND_CREDITCARD_CVC')",
    "->l('FC_PAYONE_FRONTEND_CREDITCARD_EXPIRE')",
    "->l('FC_PAYONE_FRONTEND_CREDITCARD_FIRSTNAME')",
    "->l('FC_PAYONE_FRONTEND_CREDITCARD_LASTNAME')",
    "->l('FC_PAYONE_FRONTEND_COUNTRY')",
    "->l('FC_PAYONE_FRONTEND_IBAN')",
    "->l('FC_PAYONE_FRONTEND_BIC')",
    "->l('FC_PAYONE_FRONTEND_BANK_ACCOUNT')",
    "->l('FC_PAYONE_FRONTEND_BANK_CODE')",
    "->l('FC_PAYONE_FRONTEND_DEBIT_MANDATE_ACCEPT')",
    "->l('FC_PAYONE_FRONTEND_ONLINETRANSFER_TYPE')",
    "->l('FC_PAYONE_FRONTEND_ONLINETRANSFER_BANK_GROUP')",
    "->l('FC_PAYONE_FRONTEND_ORDER_CONFIRM')",
    "->l('FC_PAYONE_FRONTEND_ORDER_CONFIRM_CONTACT')",
    "->l('FC_PAYONE_FRONTEND_ORDER_CONFIRM_CONTACT_LINK')",
    "->l('FC_PAYONE_FRONTEND_ORDER_CONFIRM_DOWNLOAD_PDF')",

    "->l('FC_PAYONE_PAYMENT_DESC_CREDITCARD')",
    "->l('FC_PAYONE_PAYMENT_DESC_ONLINETRANSFER')",
    "->l('FC_PAYONE_PAYMENT_DESC_DEBIT')",
    "->l('FC_PAYONE_PAYMENT_DESC_INVOICE')",
    "->l('FC_PAYONE_PAYMENT_DESC_WALLET_PAYPAL')",
    "->l('FC_PAYONE_PAYMENT_DESC_WALLET_PAYPAL_EXPRESS')",
    "->l('FC_PAYONE_PAYMENT_DESC_WALLET_PAYDIREKT')",
    "->l('FC_PAYONE_PAYMENT_DESC_WALLET_ALIPAY')",

    "->l('FC_PAYONE_FRONTEND_PAYMENT_ORDER_AMOUNT')",
    "->l('FC_PAYONE_FRONTEND_PAYMENT_ORDER_AMOUNT_TAX')",
    "->l('FC_PAYONE_FRONTEND_ORDER_CONFIRM_REFERENCE')",


);
unset($aLang);
