<?php
// require_once __DIR__ . '/../repository/CommandeRepository.php';

class CommandeController
{
    private CommandeRepository $commandeRepository;

    public function __construct()
    {
        $this->commandeRepository = new CommandeRepository();
    }

    public function index()
    {
        // Récupérer la liste des produits depuis le modèle
        $commandes = $this->commandeRepository->getAllCommandes();

        // Inclure la vue et lui passer les données
        // require __DIR__ . '/../view/admin_produits.php';
        require __DIR__ . '/../view/historique.php';
    }

    public function panier()
    {
        // if (!isset($_GET['id'])) {
        // $id = $_GET['id'];

        // Récupérer la liste des produits depuis le modèle
        $produits = $this->commandeRepository->addProduitPanier();

        // Inclure la vue et lui passer les données
        //   header('Location: index.php?page=panier');
        require __DIR__ . '/../view/panier.php';
    }

    public function removeFromPanier(){
        $produits = $this->commandeRepository->removeFromPanier();
    }
}
