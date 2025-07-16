

<table>
    <thead>
        <th>Date de la commande</th>
        <th>Prix total</th>
    </thead>
    <tbody>
        <?php foreach ($commandes as $commande): ?>
            <tr>
                <td><?= htmlspecialchars($produit->getDateCommande()) ?></td>
                <td><?= htmlspecialchars($produit->getPrixTotal()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>