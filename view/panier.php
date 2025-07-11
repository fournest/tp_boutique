<table>
    <tr class="tableau">
        <th>Nom</th>
        <th>Prix unitaire</th>
        <th>Modifier</th>
        
    </tr>

    <?php

    
    ?>
        <tr class="tableau-contenu">
            <?php if(isset($_GET['id'])) :?>
            <td><?= htmlspecialchars($_SESSION['nom'])?></td>
            <td><?= htmlspecialchars($_SESSION['prix']) ?> €</td>
       
            <td><a class="primary-button" href="index.php?removeFromPanier&id=<?= htmlspecialchars($_GET['id']) ?>">Modifier</a></td>

            <td><a href="index.php?page=delete_product&id=<?= $produit->getId() ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a></td>
        <?php endif ?>
        
        </tr>



</table>