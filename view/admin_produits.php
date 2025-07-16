<?php
// require_once __DIR__ . '/../config/Router.php';
// require_once __DIR__ . '/../config/Database.php';
// require_once __DIR__ . '/../model/Produit.php';
// require_once __DIR__ . '/../repository/ProduitRepository.php';

// if (!empty($_POST)) {
//     $produitRepository = new ProduitRepository();
//     $produits = $produitRepository->ajouterProduit($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $_POST['stock']);
// };

?>

<table>
    <tr class="tableau">
        <th>Nom</th>
        <th>description</th>
        <th>Prix</th>
        <th>Categorie</th>
        <th>Stock</th>
        <th>Actions</th>
        <th>Actions</th>
        

    </tr>

    <?php

    foreach ($produits as $produit):
    ?>
        <tr class="tableau-contenu">
            <td><?= htmlspecialchars($produit->getNom())
                ?></td>
            <td><?= htmlspecialchars($produit->getDescription()) ?></td>
            <td><?= htmlspecialchars($produit->getPrix()) ?></td>
            <td><?= htmlspecialchars($produit->getCategorie()) ?></td>
            <td><?= htmlspecialchars($produit->getStock()) ?></td>
            <td><a class="primary-button" href="index.php?page=modify_product&id=<?= $produit->getId() ?>">Modifier</a></td>

            <td><a href="index.php?page=delete_product&id=<?= $produit->getId() ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Ajouter Produits :</h2>
<form action="index.php?page=add_product" method="POST">

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

      <a href="index.php?page=liste_utilisateur">Liste utilisateurs</a>




<!-- <form action="index.php?page=delete_product">
    
    <input type="submit" value="Supprimer" name="deleteButton">


</form> -->