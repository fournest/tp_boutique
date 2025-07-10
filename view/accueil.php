<!-- Tableau des produits-->

<table>
 <tr class="tableau">
 <th>Nom</th>
 <th>description</th>
 <th>Prix</th>
 <th>Categorie</th>
 <th>Stock</th>
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
 </tr>
 <?php endforeach; ?>
</table>