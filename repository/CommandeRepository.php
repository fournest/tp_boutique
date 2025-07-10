<?php

class CommandeRepository
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }
    // //-----------------------------------------------------------
    // Méthode Ajouter commande
    // //-----------------------------------------------------------
    public function ajouterCommande($dateCommande, $prixTotal)
    {

        $sql = "INSERT INTO commandes (
            dateCommande, prixTotal
            )VALUES(
            :dateCommande,
            :prixTotal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'dateCommande' => $dateCommande,
            'prixTotal' => $prixTotal,

        ]);
    }
    // //-----------------------------------------------------------
    // Méthode
    // //-----------------------------------------------------------
    public function getAllCommandes()
    {
        $sql = "SELECT *
                FROM commandes";
        $stmt = $this->pdo->query($sql);
        $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($commandes as $value) {
            $result[] = new Commande(
                $value['id'],
                $value['date_commande'],
                $value['prix_total'],
            );
        }
        return $result;
    }
}