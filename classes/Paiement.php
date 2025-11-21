<?php
//inclure la connexion à la base de données
require_once 'Database.php';
require_once 'Vente.php';

//classe Paiement pour gérer les paiements des dettes des clients
class Paiement{
    private $id_vente;
    private $montant_paye;
    private $date_paiement;
    //constructeur pour initialiser les attributs lors de la création d'un objet Paiement
    public function __construct($id_vente, $montant_paye, $date_paiement){
        $this->id_vente = $id_vente;
        $this->montant_paye = $montant_paye;
        $this->date_paiement = $date_paiement ?? date('Y-m-d');
    }   
    //pour enregistrer un paiement
    public function enregistrerPaiement($conn){
        // Vérifier si la vente existe
        $stmt0 = $conn->prepare("SELECT * FROM ventes WHERE id = :id");
        $stmt0->execute([':id' => $this->id_vente]);
        $vente = $stmt0->fetch();
        if(!$vente){
            return false;
        }

        // Enregistrer le paiement
        $query = "INSERT INTO paiements (id_vente, montant_paye, date_paiement) 
                  VALUES (:id_vente, :montant_paye, :date_paiement)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_vente', $this->id_vente);
        $stmt->bindParam(':montant_paye', $this->montant_paye);
        $stmt->bindParam(':date_paiement', $this->date_paiement);
        $result = $stmt->execute();

        if($result){
            // Mettre à jour le reste à payer dans la table ventes
            $nouveau_reste = max(0, $vente['reste'] - $this->montant_paye);
            $stmt2 = $conn->prepare("UPDATE ventes SET reste = :reste WHERE id = :id");
            $stmt2->bindParam(':reste', $nouveau_reste);
            $stmt2->bindParam(':id', $this->id_vente);
            $stmt2->execute();
        }
        return $result;
    }
}