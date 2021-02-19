import Modal from './Modal.js';

// Envio
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()
        const encomiendaForm = document.getElementById('encomiendaForm')
        const transferenciaForm = document.getElementById('transferenciaForm')
        const paidFormCommend = document.getElementById('paidFormCommend')
        const operationSummary = document.getElementById('operationSummary')

        // Billetera
        const billeteraForm = document.getElementById('billeteraForm')

        if (billeteraForm) {
            const amountWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="amountWallet"]`)
            const currencyWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="currencyWallet"]`)
            const users = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="users"]`)
            const btnSubmitBilletera = document.querySelector('[data-targetping="billetera"]')

            const beneficiarioWallet = document.getElementById('beneficiarioWallet')

            amountWallet.addEventListener('blur', () => {
                step1Wallet()
            })
            currencyWallet.addEventListener('change', () => {
                step1Wallet()
            })

            // Resumen de operacion
            async function step1Wallet() {
                // Cuando ambos campos esten llenos seguiente etapa
                if (amountWallet.value && (currencyWallet.options[currencyWallet.selectedIndex].value !== "Seleccione")) {
                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsendw");
                    formData.append("amountWallet", amountWallet.value);
                    formData.append("currencyWallet", currencyWallet.options[currencyWallet.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader')

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // Quitando spinner
                    modal.closeModal('loader')

                    // Fetch exitoso
                    if (res.code == "0000") {
                        // liberando inputs y mostrando los resultados
                        let resAmount = new Intl.NumberFormat().format(amountWallet.value),
                            resComission = new Intl.NumberFormat().format(res.usdcommission)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto envio en divisa: ${parseInt(resAmount).toFixed(2)}
                            </p>
                            <p>
                                ${res.txtusdcommission}: ${parseInt(resComission).toFixed(2)}
                            </p>
                        `
                        const inner = document.querySelector('#operationSummary .modal-body')
                        inner.innerHTML = html

                        modal.openModal('operationSummary')
                        beneficiarioWallet.classList.remove('hidden')
                    } else {
                        console.log('Error interno');
                    }
                }
            }

            beneficiarioWallet.addEventListener('change', () => {
                // Mostramos boton de enviar
                btnSubmitBilletera.classList.remove('hidden')
            })

            btnSubmitBilletera.addEventListener('click', async e => {
                e.preventDefault()
                // GEN OTP FETCH
                let formData = new FormData()
                formData.append("cond", "genotp");

                let dataOtp = await fetch("ajax.php", { method: 'POST', body: formData });
                let resOtp = await dataOtp.json();
                console.log(resOtp, 'otp');

                if (resOtp.code == "0000") {
                    // abrir modal para ultimo fetch 
                    modal.openModal('otpVerification')

                    document.getElementById('otpCode').value = resOtp.otp

                    document.querySelector("[data-id='testing']").addEventListener('click', e => {
                        e.preventDefault()
                        test()
                    })
                }

            })

            async function test() {
                // ENVIO FETCH
                // Todo: validar campos
                let formData = new FormData()
                formData.append("cond", "addEnvio");
                formData.append("amountWallet", amountWallet.value);
                formData.append("currencyWallet", currencyWallet.options[currencyWallet.selectedIndex].value);
                formData.append("users", users.options[users.selectedIndex].value);
                modal.closeModal('otpVerification')

                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                let res = await data.json();

                if(res.code === "0000") {
                    modal.openModal('success')
                }else{
                    console.log(':c');
                }
            }

        }
    })
}
