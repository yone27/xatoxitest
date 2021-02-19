<?php
        include_once("../xpresentationlayer.php");
?>

<div class="modal modal--OtpVeri" id="otpVerification">
    <div class="modal-dialog">
        <section class="modal-content">
            <header class="modal-header">
                <h3 class="modal__title">Resumen de operación</h3>
                <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
            </header>
            <aside class="modal-body">
            <?php
        xpresentationLayer::buildOtpContent();
?>
            </aside>
            <footer class="modal-footer">
                <button class="modal__button" type="button" aria-label="close modal" data-close>Continuar</button>
            </footer>
        </section>
    </div>
</div>