<?php

error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");

$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");


xpresentationLayer::buildHeaderXatoxi();


xpresentationLayer::startMain();

xpresentationLayer::startInputModal("modalContainer modalContainer--custom");
xpresentationLayer::buildPinPrincipalModal("PIN", 4, 4, "", "btnEnvioSubmit");

xpresentationLayer::endInputModal();

xpresentationLayer::startSectionOpt();
xpresentationLayer::buildOptionsPrincipal("Billetera", "Billetera");
xpresentationLayer::buildOptionsPrincipal("Encomienda", "Encomienda");
xpresentationLayer::buildOptionsPrincipal("Transferencia", "Transferencia");
xpresentationLayer::endSection();

xpresentationLayer::startAnimationMenu();
xpresentationLayer::startSectionButtos();
xpresentationLayer::buildOptionGrid("Billetera", "Billetera");
xpresentationLayer::buildOptionGrid("Encomienda", "Encomienda");
xpresentationLayer::buildOptionGrid("Transferencia", "Transferencia");
xpresentationLayer::endSection();
xpresentationLayer::startContentSection();

// billetera
xpresentationLayer::startContentofOption("Billetera");
xpresentationLayer::startForm("billeteraForm");
xpresentationLayer::buildInputNumberCenter("MONTO", "amountWallet", "amountWallet", "0.00");

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyWallet", "currencyWallet", $data_json, "", "");

$data_json = $serviceCall->mgetpartyxl();

?>
<div id="beneficiarioWallet" class="hidden">
        <?php
        xpresentationLayer::buildTitleBar("BENEFICIARIO");
        xpresentationLayer::buildSearchUsersWallet("users", "users", $data_json, "", "", "", "");
        ?>
</div>
<?php


xpresentationLayer::buildSectionPin("billetera");
xpresentationLayer::endForm();
xpresentationLayer::endDiv();
// -- billetera
//Comiendo seccion Encomienda
xpresentationLayer::startContentofOption("Encomienda");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Monto", "amountCommend", "amountCommend", "0.00", "onblurCustom('providerCommend/countryCommend/amountCommend', 'exchangeRateCommend/amountBsCommend', 'ajax.php?cond=mcalcsend')");

$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryCommend", "countryCommend", $data_json, "", "selectValorforId('countryCommend/providerCommend', 'ajax.php?cond=mgetproviderl')");

xpresentationLayer::buildSelectJson("Proveedor", "providerCommend", "providerCommend", "", "", "execTwoFuntions('providerCommend/countryCommend/amountCommend', 'exchangeRateCommend/amountBsCommend', 'ajax.php?cond=mcalcsend', 'providerCommend/sendFormCommend', 'ajax.php?cond=mgetremitancetypel')");

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyCommend", "currencyCommend", $data_json, "", "");


xpresentationLayer::buildSelectJson("Entrega", "sendFormCommend", "sendFormCommend", "");

$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormCommend", "paidFormCommend", $data_json, "", "");

xpresentationLayer::endSection();
xpresentationLayer::buildInputTextCenter("Referencia", "referenceCommend", "referenceCommend", "0");

xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextDisable("Tasa de Cambio", "exchangeRateCommend", "exchangeRateCommend", "0.00");
xpresentationLayer::buildInputTextDisable("Monto Bs", "amountBsCommend", "amountBsCommend", "0.00");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "receiveAccount", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceCommendCuenta", "referenceCommendCuenta", "");
xpresentationLayer::endSection();

xpresentationLayer::buildTitleBar("BENEFICIARIO");

xpresentationLayer::buildSearchUsersCommend("Usuarios", "usersCommend", "usersCommend", "", "", "", "");


xpresentationLayer::startSectionTwoColumns();

xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameCommend", "firstNameCommend", "");
xpresentationLayer::buildInputTextGrid("Segundo nombre", "secondNameCommend", "secondNameCommend", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameCommend", "firstSurnameCommend", "");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameCommend", "secondSurnameCommend", "");

xpresentationLayer::buildInputTextLargeCenter("Direccion", "directionCommend", "directionCommend", "");

xpresentationLayer::buildInputTextGrid("Email", "emailCommend", "emailCommend", "Ejemplo@mail.com");
xpresentationLayer::buildInputTextGrid("Telefono", "phoneCommend", "phoneCommend", "");
xpresentationLayer::buildInputTextGrid("Banco", "bankCommend", "bankCommend", "", "");
xpresentationLayer::buildInputTextGrid("Cuenta", "accountCommend", "accountCommend", "");

xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin();

xpresentationLayer::endDiv();
//Fin seccion de Encomienda

//Comiendo seccion Transferencia
xpresentationLayer::startContentofOption("Transferencia");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Monto", "amountTransfer", "amountTransfer", "0.00");

$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryTransfer", "countryTransfer", $data_json);

$data_json = $serviceCall->mgetcurrencytrl();
xpresentationLayer::buildSelectJson("Moneda", "currencyTransfer", "currencyTransfer", $data_json, "", "");

$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormTransfer", "paidFormTransfer", $data_json, "", "");
xpresentationLayer::buildInputTextDisable("Tasa de Cambio", "exchangedRateTransfer", "exchangedRateTransfer     ", "0.00");
xpresentationLayer::buildInputTextDisable("Monto Bs", "countryTransfer", "countryTransfer", "0.00");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "providerTransfer", "providerTransfer", $data_json, "", " ");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransfer", "referenceTransfer", "");
xpresentationLayer::endSection();

xpresentationLayer::buildTitleBar("BENEFICIARIO");

xpresentationLayer::buildSearchUsersCommend("Usuarios", "usersTransfer", "usersTransfer", "", "", "", "");


xpresentationLayer::startSectionTwoColumns();

xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameTransfer", "firstNameTransfer", "");
xpresentationLayer::buildInputTextGrid("Segund  o nombre", "secondNameTransfer", "secondNameTransfer", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameTransfer", "firstSurnameTransfer", "");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameTransfer", "secondSurnameTransfer", "");

xpresentationLayer::buildInputTextLargeCenter("Direccion", "directionTransfer", "directionTransfer", "");

xpresentationLayer::buildInputTextGrid("Email", "emailTransfer", "emailTransfer", "Ejemplo@mail.com");
xpresentationLayer::buildInputTextGrid("Telefono", "phoneTransfer", "phoneTransfer", "");
xpresentationLayer::buildInputTextGrid("Banco", "bankTransfer", "bankTransfer", "", "");
xpresentationLayer::buildInputTextGrid("Cuenta", "accountTransfer", "accountTransfer", "");
xpresentationLayer::buildInputTextGrid("Pais Banco", "countryBankTransfer", "countryBankTransfer", "", "");
xpresentationLayer::buildInputTextGrid("Ciudad Banco", "cityBankTransfer", "cityBankTransfer", "");
xpresentationLayer::buildInputTextLargeCenter("Direccion Banco", "bankDirectionTransfer", "bankDirectionTransfer", "");
xpresentationLayer::buildInputTextLargeCenter("ABA / SWIFT/ IBAN", "abaSwiftIban", "abaSwiftIban", "");
xpresentationLayer::buildInputTextGrid("Banco Intermediario", "bankTransferIntermediary", "bankTransferIntermediary", "", "");
xpresentationLayer::buildInputTextGrid("Cuenta Intermediario", "accountTransferIntermediary", "accountTransferIntermediary", "");
xpresentationLayer::buildInputTextGrid("Pais Intermediario", "countryBankTransferIntermediary", "countryBankTransferIntermediary", "", "");
xpresentationLayer::buildInputTextGrid("Ciudad Intermediario", "cityBankTransferIntermediary", "cityBankTransferIntermediary", "");
xpresentationLayer::buildInputTextLargeCenter("Direccion Banco Intermediario", "bankDirectionTransferIntermediary", "bankDirectionTransferIntermediary", "");
xpresentationLayer::buildInputTextLargeCenter("ABA / SWIFT/ IBAN Intermediario", "providerIntermediary", "providerIntermediary", "");
xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin();

xpresentationLayer::endDiv();
//Fin seccion de Transferencia

xpresentationLayer::endDiv();
xpresentationLayer::endDiv();

xpresentationLayer::endMain();

include './modals/base.php';
include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();

xpresentationLayer::endHtml();

?>