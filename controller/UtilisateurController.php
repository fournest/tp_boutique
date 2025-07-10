<?php
require_once __DIR__ . '/../repository/UtilisateurRepository.php';

class UtilisateurController
{
    private UtilisateurRepository $utilisateurRepository;

    public function __construct()
    {
        $this->utilisateurRepository = new UtilisateurRepository();
    }

    public function login()
    {
        // Récupérer la liste des produits depuis le modèle
        $utilisateurs = $this->utilisateurRepository->getAllUtilisateurs();

        // Inclure la vue et lui passer les données
        // require __DIR__ . '/../view/admin_produits.php';
        require __DIR__ . '/../view/login.php';
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer la liste des utilisateurs depuis le modèle

        // Sans constructeur dans utilisateurs
        // ------------------------------------
        // $utilisateur = new Utilisateur();
        // $utilisateur->setNom($_POST['nom']);
        //  $utilisateur->setNom($_POST['prenom']);
        //   $utilisateur->setNom($_POST['email']);
        //   $utilisateur->setNom($_POST['password']);
        //   UtilisateurRepository::ajouterUtilisateur();

        // Récupérer la liste des utilisateurs depuis le modèle

        // Avec constructeur dans utilisateurs
        // ------------------------------------
        $utilisateurs = $this->utilisateurRepository->ajouterUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['isAdmin']);


        } else {
            // Inclure la vue et lui passer les données
            require __DIR__ . '/../view/register.php';
        }
    }
}