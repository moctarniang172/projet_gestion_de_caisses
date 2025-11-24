<<?php
require_once '../classes/Database.php';
require_once '../classes/Paiement.php';

$conn = (new Database())->getConnection();
$paiement = new Paiement(null, null, null);

$dettes = $paiement->Lister($conn);

require_once '../views/liste_dettes.php';


