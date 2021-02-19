<?php
        include_once("xpresentationlayer.php");
        xpresentationLayer:: startHtml("esp");
        xpresentationLayer:: buildHead("Xatoxi");
        xpresentationLayer:: buildHeaderText("Transacción Satisfactoria");
        
        xpresentationLayer::startMain();
        xpresentationLayer:: buildSuccessful("Transacción Satisfactoria", "Regreso Inicio");        
        xpresentationLayer::endMain();

        xpresentationLayer::buildFooterXatoxi();

        xpresentationLayer::endSection();
        xpresentationLayer:: endHtml();
?>