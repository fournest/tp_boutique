  <?php
    // require_once __DIR__ . '/../model/Utilisateur.php';
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
        public function getAllUtilisateurs()
        {
            $sql = "SELECT *
                    FROM utilisateurs";
            $stmt = $this->pdo->query($sql);
            $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($utilisateurs as $utilisateur) {
                $result[] = new Utilisateur($utilisateur["id"], $utilisateur["nom"], $utilisateur["prenom"], $utilisateur["email"], $utilisateur["password"]);
            }
            return $result;
        }

        // //-----------------------------------------------------------
        // Méthode Ajouter Utilisateur
        // //-----------------------------------------------------------
        public function ajouterUtilisateur($nom, $prenom, $email, $password)
        {
            $sql = "INSERT INTO utilisateurs (
            nom,
            prenom,
            email,
            password
            
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password
         
        );";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)

            ]);
            $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function sessionLogin()
        {
            



            // $password = $_POST['password'];
            $sql = "SELECT * FROM utilisateurs WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['email' => $_POST['email']]);
            $utilisateur = $stmt->fetch();

            // if ($utilisateur) {
                if (password_verify($_POST['password'], $utilisateur['password'])) {
                   
                    $_SESSION['email'] = $utilisateur['email'];
                    $_SESSION['prenom'] = $utilisateur['prenom'];
                    $_SESSION['isAdmin'] = $utilisateur['isAdmin'];
                    header('Location: index.php?page=accueil');
                    exit();
                } else {
                    $passwordError = "Votre mot de passe est incorrect";
                }
            // } else {
            //     $nameError = "Le nom et/ou l'email sont introuvables";
            // };
        }

       
    }
