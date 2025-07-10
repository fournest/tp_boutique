<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../config/Router.php';
require_once __DIR__ . '/../model/Commande.php';
require_once __DIR__ . '/../repository/CommandeRepository.php';
require_once __DIR__ . '/../controller/CommandeController.php';

?>

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