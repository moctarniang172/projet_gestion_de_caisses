<?php
require_once 'Database.php';
class Vente{
    private $nom_client;
    private $poisson;
    private $poids;
    private $prix_unitaire;
    private $total;
    private $avance;
    private $reste;
    private $date_vente;


    //constructeur pour ques les attributs soient initialisés lors de la création d'un objet Vente

    public function __construct($nom_client, $poisson, $poids, $prix_unitaire, $avance, $date_vente){
        $this->nom_client = $nom_client;
        $this->poisson = $poisson;
        $this->poids = $poids;
        $this->prix_unitaire = $prix_unitaire;
        $this->total = $poids * $prix_unitaire;
        $this->avance = $avance;
        $this->reste = max(0, $this->total - $avance);
        $this->date_vente = $date_vente ?? date('Y-m-d');
    }

    //pour enregistrer une vente
    public function enregistrerVente($conn){
        $query = "INSERT INTO ventes (nom_client, poisson, poids, prix_unitaire, total, avance, reste, date_vente) 
                  VALUES (:nom_client, :poisson, :poids, :prix_unitaire, :total, :avance, :reste, :date_vente)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nom_client', $this->nom_client);
        $stmt->bindParam(':poisson', $this->poisson);
        $stmt->bindParam(':poids', $this->poids);
        $stmt->bindParam(':prix_unitaire', $this->prix_unitaire);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':avance', $this->avance);
        $stmt->bindParam(':reste', $this->reste);
        $stmt->bindParam(':date_vente', $this->date_vente);
        return $stmt->execute();

}

//pour modifier une vente
    public function modifierVente($conn, $id){
    // Vérifier si la vente existe
    $stmt0 = $conn->prepare("SELECT * FROM ventes WHERE id = :id");
    $stmt0->execute([':id' => $id]);
    if(!$stmt0->fetch()){
        return false;
    }

    // Mise à jour
    $stmt = $conn->prepare("
        UPDATE ventes SET 
        nom_client = :nom_client,
        poisson = :poisson,
        poids = :poids,
        prix_unitaire = :prix_unitaire,
        total = :total,
        avance = :avance,
        reste = :reste,
        date_vente = :date_vente
        WHERE id = :id
    ");

    return $stmt->execute([
        ':nom_client' => $this->nom_client,
        ':poisson' => $this->poisson,
        ':poids' => $this->poids,
        ':prix_unitaire' => $this->prix_unitaire,
        ':total' => $this->total,
        ':avance' => $this->avance,
        ':reste' => $this->reste,
        ':date_vente' => $this->date_vente,
        ':id' => $id
    ]);
}


    
}






