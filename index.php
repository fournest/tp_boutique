<?php

session_start();

define('BASE_URL', 'http://localhost/Arinfo/PHP_MVC_TP-boutique');
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/config/Router.php';
require_once __DIR__ . '/controller/AdminController.php';
require_once __DIR__ . '/model/Utilisateur.php';
require_once __DIR__ . '/repository/UtilisateurRepository.php';
require_once __DIR__ . '/controller/UtilisateurController.php';
require_once __DIR__ . '/model/Commande.php';
require_once __DIR__ . '/repository/CommandeRepository.php';
require_once __DIR__ . '/controller/CommandeController.php';
require_once __DIR__ . '/model/Produit.php';
require_once __DIR__ . '/repository/ProduitRepository.php';
require_once __DIR__ . '/controller/ProduitController.php';
require_once __DIR__ . '/model/DetailCommande.php';
require_once __DIR__ . '/repository/DetailCommandeRepository.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include './view/layout/header.php'  ?>
<?php Router::redirect(); ?>

    <?php include './view/layout/footer.php'  ?>


</body>
</html>