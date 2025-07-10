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
}
