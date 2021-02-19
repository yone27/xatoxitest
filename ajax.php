<?php
include_once("xclient.php");
$client = new xclient("");

//Se llama al servicio para llenar el select hijo
if (isset($_GET["cond"])) {
    if ($_GET["cond"] == "mgetproviderl") {
        $data_json = $client->mgetproviderl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcellphoneareacodel") {

        $data_json = $client->mgetcellphoneareacodel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcurrencysrcl") {
        $data_json = $client->mgetcurrencysrcl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetinstrumentdstl") {
        $data_json = $client->mgetinstrumentdstl($_GET["valor0"], $_GET["valor1"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcurrencydstl") {
        $data_json = $client->mgetcurrencydstl($_GET["valor0"], $_GET["valor1"], $_GET["valor2"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetremitancetypel") {
        $data_json = $client->mgetremitancetypel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mcalcsend") {
        $data_json = $client->mcalcsend(2, $_GET["valor0"], $_GET["valor1"], $_GET["valor2"]);
        print_r(json_encode($data_json));
    }
}

if (isset($_POST["cond"])) {
    if (isset($_POST["newRegister"])) {
        $user = $_POST["User"];
        $email = $_POST["Email"];
        $phone = $_POST["CodeCountry"] . $_POST["codeArea"] . $_POST["Phone"];


        $data_json = $client->maddlead("", $user, "", $email, "", $phone, "", "", "", "", "", "");
        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "AuthPin") {
        $pin = $_POST["pin"];
        $tag = $_POST["tag"];
        $data_json = $client->mauth("lenovi", "04242337645", $pin);

        // echo gettype($data_json);
        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "addEntrust") {
    }

    if ($_POST["cond"] == "calcsendw") {
        $data_json = $client->mcalcsendw("2", $_POST['amountWallet'], $_POST['currencyWallet']);

        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "genotp") {
        $dataGenOTP = $client->mgenotp(2);

        echo json_encode($dataGenOTP);
    }

    if ($_POST["cond"] == "addEnvio") {


        $data_json = $client->mexecsendw("2", $_POST['users'], $_POST['amountWallet'], $_POST['currencyWallet']);


        // print_r($_POST);
        echo json_encode($data_json);
    }
}
