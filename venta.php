<?php
        error_reporting(0);
        include_once("xpresentationlayer.php");        
        include_once("xclient.php");
        $serviceCall = new xclient("");
        xpresentationLayer:: startHtml("esp");
        xpresentationLayer:: buildHead("Xatoxi");
        xpresentationLayer:: buildHeaderXatoxi();


        xpresentationLayer::startMain();
        xpresentationLayer::startFirtsSection();
        xpresentationLayer::buildOptionGrid("Venta Divisa");
        xpresentationLayer::endSection();

        xpresentationLayer::startSectionTwoColumns();
        xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0.00");
        $data_json = $serviceCall->mgetcurrencyl();
        xpresentationLayer::buildSelectJson("Divisa", "currency", "currency", $data_json, "", "");
        $data_json = $serviceCall->mgetdebitinstrumentl();
        xpresentationLayer::buildSelectJson("Debitar de", "payIn", "payIn", $data_json, "", "");        
        $data_json = $serviceCall->mgetcreditinstrumentl();
        xpresentationLayer::buildSelectJson("Abonar en", "payForm", "payForm", $data_json, "", "");
        xpresentationLayer::buildInputTextDisable("Tasa de Cambio", "amountChange", "amountChange", "0.00");
        xpresentationLayer::buildInputTextDisable("Monto a recibir Bs.", "amountRecieve", "amountRecieve", "0.00");
        xpresentationLayer::buildInputTextGrid("Cuenta Bancaria", "bankAccount", "bankAccount", "", 20);
        xpresentationLayer::endSection();        
        xpresentationLayer::buildSectionPin();   
        xpresentationLayer::endMain();

        xpresentationLayer::buildFooterXatoxi();

        xpresentationLayer::endSection();
        xpresentationLayer:: endHtml();
?>