<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomComplet = $_POST["nomComplet"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $typeAide = $_POST["typeAide"];
    $message = $_POST["message"];

    // Adresse e-mail de destination
    $to = "seniorplus@orange.fr";

    // Sujet de l'e-mail
    $subject = "Nouveau message de formulaire de contact";

    // Corps de l'e-mail
    $messageBody = "Nom Complet: $nomComplet\n";
    $messageBody .= "Email: $email\n";
    $messageBody .= "Téléphone: $telephone\n";
    $messageBody .= "Type d'Aide: $typeAide\n";
    $messageBody .= "Message:\n$message";

    // Entêtes de l'e-mail
    $headers = "From: $email";

    // Envoyer l'e-mail
    if (mail($to, $subject, $messageBody, $headers)) {
        // Si l'e-mail est envoyé avec succès, vous pouvez renvoyer une réponse JSON si nécessaire
        $response = array("status" => "success", "message" => "Message envoyé avec succès!");
        echo json_encode($response);
    } else {
        // En cas d'échec de l'envoi de l'e-mail
        $response = array("status" => "error", "message" => "Erreur lors de l'envoi du message.");
        echo json_encode($response);
    }
}
?>
