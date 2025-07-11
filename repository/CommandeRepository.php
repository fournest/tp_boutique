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

    // //-----------------------------------------------------------
    // Méthode ajout produit au panier
    // //-----------------------------------------------------------
    public function addProduitPanier()
    {

        $sql = "SELECT * FROM produits  WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();

        $produit = $stmt->fetch();

        if ($produit) {
                $_SESSION ['panier'][] = $produit['id'];
                
           
            // header('Location: index.php?page=panier');
            // exit();
        }



    }

    public function removeFromPanier()
    {
        $sql = "SELECT * FROM produits WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();

        $produit = $stmt->fetch();

        if ($produit) {
            unset($_SESSION['nom']);
            unset($_SESSION['prix']);

            header("Location: index.php?page=panier");
        }
    }
}
