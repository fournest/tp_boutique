<table>
    <tr class="tableau">
        <th>Nom</th>
        <th>Prenom</th>
        <th>email</th>
        <th>password</th>
        <th>isAdmin</th>
    </tr>

    <?php

    foreach ($utilisateurs as $utilisateur):
    ?>
        <tr class="tableau-contenu">
            <td><?=
                htmlspecialchars($utilisateur->getNom())
                ?></td>
            <td><?= htmlspecialchars($utilisateur->getPrenom()) ?></td>
            <td><?= htmlspecialchars($utilisateur->getEmail()) ?></td>
            <td><?= htmlspecialchars($utilisateur->getPassword()) ?></td>
            <td><?= htmlspecialchars($utilisateur->getIsAdmin()) ?></td>
        </tr>
    <?php endforeach; ?>
</table>