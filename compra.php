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
        xpresentationLayer::buildOptionGrid("Compra Divisa");
        xpresentationLayer::endSection();

        xpresentationLayer::startSectionTwoColumns();
        xpresentationLayer::buildInputNumberGrid("Monto", "Amount", "Amount", "0.00");

        $data_json = $serviceCall->mgetcurrencyl();
        xpresentationLayer::buildSelectJson("Divisa", "Currency", "Currency", $data_json, "", "");
        
        xpresentationLayer::buildSelectJson("Abonar en", "payIn", "payIn", "", "", "");
        xpresentationLayer::buildSelectJson("Forma de Pago", "payForm", "payForm", "", "", "");
        xpresentationLayer::buildSelectLarge("Cuentas Bancarias Receptoras", "accountBanks", "accountBanks", "", "", "");
        xpresentationLayer::endSection();        
        xpresentationLayer::buildSectionPin();   
        xpresentationLayer::endMain();

        xpresentationLayer::buildFooterXatoxi();

        xpresentationLayer::endSection();
        xpresentationLayer:: endHtml();
?>