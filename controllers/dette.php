<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes/Database.php';
require_once '../classes/Paiement.php';

$conn = (new Database())->getConnection();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_vente = $_POST['id_vente'];
    $montant_paye = $_POST['montant_paye'];
    $date_paiement = date('Y-m-d');

    $paiement = new Paiement($id_vente, $montant_paye, $date_paiement);
    $success = $paiement->enregistrerPaiement($conn);

    if($success){
        header('Location: /../controllers/liste_dettes.php');
        exit();
    } else {
        echo "Erreur lors de l'enregistrement du paiement.";
    }
}
