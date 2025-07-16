<section class="panier">
    <h1>Mon Panier</h1>
    <table>
        <thead>
            <th>Article</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $totalPrice = 0;
            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])):
                // print_r($_SESSION['panier']); 
            ?>

                <?php foreach ($_SESSION['panier'] as $index => $produit):
                    $produit = unserialize($produit);
                    $itemTotalPrice = $produit->getPrix() * $produit->getQuantity();
                    $totalPrice += $itemTotalPrice; ?>
                    <tr>
                        <td><?= htmlspecialchars($produit->getNom()) ?></td>
                        <td><?= htmlspecialchars(number_format($produit->getPrix(), 2, ',', ' ')) ?>€</td>
                        <td><?= htmlspecialchars($produit->getQuantity()) ?></td>
                        <td>
                            <a href="index.php?page=removeFromPanier&id=<?= htmlspecialchars($produit->getId()) ?>" onclick="return confirm('Diminuer la quantité ou supprimer l\'article ?')">Supprimer / -1</a>
                        </td>
                    </tr>
                <?php
                endforeach;

                ?>

            <?php else : ?>
                <tr>
                    <td colspan="4">Votre panier est vide.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong><?= htmlspecialchars(number_format($totalPrice, 2, ',', ' ')) ?>€</strong></td>
            </tr>
        </tfoot>
    </table>
   <a class="primary-button" href="index.php?page=addCommande&totalPrice=<?= htmlspecialchars($totalPrice) ?>">Valider la commande</a>
    </div>
</section>