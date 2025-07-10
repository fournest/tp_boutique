<?php
require_once __DIR__ . '/../config/Router.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../model/Produit.php';
require_once __DIR__ . '/../repository/ProduitRepository.php';

if (!empty($_POST)) {
 $produitRepository = new ProduitRepository();
 $produits = $produitRepository->ajouterProduit($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $_POST['stock']);
};

?>

<h2>Ajouter Produits :</h2>
<form action="index.php?page=admin_produits" method="POST">

    <label for="nom">Nom</label>
    <input type="text" name="nom">

    <label for="description">Description</label>
    <input type="text" name="description">

    <label for="prix">Prix</label>
    <input type="text" name="prix">

    <label for="categorie">Catégorie</label>
    <input type="text" name="categorie">

    <label for="stock">Stock</label>
    <input type="text" name="stock">

    <input type="submit" value="Ajouter" name="addButton">

</form>