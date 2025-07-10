   <?php
require_once __DIR__ . '/../model/Utilisateur.php';
    class UtilisateurRepository
    {

        private $pdo;

        public function __construct()
        {
            $this->pdo = Database::connect();
        }
        // //-----------------------------------------------------------
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

        // //-----------------------------------------------------------
        // Méthode Ajouter Utilisateur
        // //-----------------------------------------------------------
        public function ajouterUtilisateur($nom, $prenom, $email, $password, $isAdmin)
        {
            $sql = "INSERT INTO utilisateurs (
            nom,
            prenom,
            email,
            password,
            isAdmin
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password,
            :isAdmin
        );";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $password,
                'isAdmin' => $isAdmin
            ]);
            $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
    }