<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérification du captcha
    $userCaptcha = intval($_POST["captcha"]);
    $captchaNum1 = intval($_POST["captchaNum1"]);
    $captchaNum2 = intval($_POST["captchaNum2"]);
    $captchaOperator = $_POST["captchaOperator"];

    $providedResult = 0;
    if ($captchaOperator === "+") {
        $providedResult = $captchaNum1 + $captchaNum2;
    } else if ($captchaOperator === "-") {
        $providedResult = $captchaNum1 - $captchaNum2;
    } else if ($captchaOperator === "*") {
        $providedResult = $captchaNum1 * $captchaNum2;
    } else {
        echo "failed"; // Captcha incorrect
        exit;
    }

    if ($userCaptcha !== $providedResult) {
        echo "failed"; // Captcha incorrect
        exit;
    }

    // Reste du traitement du formulaire
    $nomComplet = $_POST["nomComplet"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $typeAide = $_POST["typeAide"];
    $message = $_POST["message"];

    // Ajoutez ici le code pour envoyer l'e-mail via Mailjet ou autre service
    // ...

    echo `<div class="alert alert-success" role="alert">
          A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
        </div>`;
} else {
    echo "Un problème est survenu lors de l'envoi du message.";
}

