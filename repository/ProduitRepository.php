  <?php
    require_once __DIR__ . '/../model/Produit.php';
    class ProduitRepository
    {

        private $pdo;

        public function __construct()
        {
            $this->pdo = Database::connect();
        }
        // //-----------------------------------------------------------
        // Méthode Selectionner Produit
        // //-----------------------------------------------------------
        public function getAllProduits()
        {
            $sql = "SELECT *
                    FROM produits";
            $stmt = $this->pdo->query($sql);
            $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($produits as $produit) {
                $result[] = new Produit($produit["id"], $produit["nom"], $produit["description"], $produit["prix"], $produit["categorie"], $produit["stock"]);
            }
            return $result;
        }

        // //-----------------------------------------------------------
        // Méthode Ajouter Produit
        // //-----------------------------------------------------------
        public function ajouterProduit($nom, $description, $prix, $categorie, $stock)
        {
            $sql = "INSERT INTO produits (
            nom,
            description,
            prix,
            categorie,
            stock
        ) VALUES (
            :nom,
            :description,
            :prix,
            :categorie,
            :stock
        );";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'nom' => $nom,
                'description' => $description,
                'prix' => $prix,
                'categorie' => $categorie,
                'stock' => $stock
            ]);
            $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // header('Location: index.php');
        }

        // // ------------------------------------------------------
        // Modification des produits
        // // ------------------------------------------------------
        public function modifierProduit($id, $nom, $description, $prix, $categorie, $stock)
        {

            $sql = 'UPDATE produits
            SET
            nom = :nom,
            description = :description,
            prix = :prix,
            categorie = :categorie,
            stock = :stock
            WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'nom' => $nom,
                'description' => $description,
                'prix' => $prix,
                'categorie' => $categorie,
                'stock' => $stock,
                'id' => $id
            ]);
            $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // //-----------------------------------------------------------
        // Méthode Selectionner un seul Produit
        // //-----------------------------------------------------------
        public function getProduit($id)
        {
            $sql = "SELECT *
                FROM produits
                WHERE id = :id;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $produit = $stmt->fetch(PDO::FETCH_ASSOC);

            return new Produit(
                $produit['id'],
                $produit['nom'],
                $produit['description'],
                $produit['prix'],
                $produit['categorie'],
                $produit['stock']
            );
        }
        // // ------------------------------------------------------
        // Supprimer des produits
        // // ------------------------------------------------------
        public function supprimerProduit($id)
        {
            $sql = 'DELETE FROM produits
        WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'id' => $id
            ]);
        }

         // Méthode Selectionner Utilisateur
        // //-----------------------------------------------------------
        public function getAllUtilisateurs(){
            $sql = "SELECT *
                    FROM utilisateurs";
            $stmt = $this->pdo->query($sql);
            $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 $result = [];
            foreach ($utilisateurs as $utilisateur) {
                 $result[] = new Utilisateur($utilisateur["id"], $utilisateur["nom"], $utilisateur["prenom"], $utilisateur["email"],$utilisateur["password"],$utilisateur["isAdmin"]);
            }
            return $result;
        }
    }


    ?>