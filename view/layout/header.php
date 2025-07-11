<nav>
    <!-- <button class="burger-menu" id="burger-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button> -->
    <ul class="navbar" id="navbar">
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        ?>
        <li><a href="index.php?page=accueil" <?php if ($currentPage == 'index.php?page=accueil') {
                                                    echo 'class="active"';
                                                } ?>>accueil</a></li>
        <?php if (!isset($_SESSION['email'])) : ?>

            <li><a href="index.php?page=login" <?php if ($currentPage == 'index.php?page=login') {
                                                    echo 'class="active"';
                                                } ?>>Se connecter</a></li>
        <?php endif ?>

        <?php if (!isset($_SESSION['email'])) : ?>
            <li><a href="index.php?page=register" <?php if ($currentPage == 'index.php?page=register') {
                                                        echo 'class="active"';
                                                    } ?>>S'inscrire</a></li>
        <?php endif ?>
        <li><a href="index.php?page=panier" <?php if ($currentPage == 'index.php?page=panier') {
                                                echo 'class="active"';
                                            } ?>>Panier</a></li>
        <li><a href="index.php?page=historique" <?php if ($currentPage == 'index.php?page=historique') {
                                                    echo 'class="active"';
                                                } ?>>historique</a></li>
                                                 <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === 1): ?>
        <li><a href="index.php?page=admin_produits" <?php if ($currentPage == 'index.php?page=admin_produits') {
                                                        echo 'class="active"';
                                                    } ?>>Tableau de bord</a></li>
                                                     <?php endif; ?>

    </ul>

    <?php
    if (isset($_SESSION['email'])): ?>
        <h3 class="fourth-title">Bienvenue, <span class=""><?= htmlspecialchars($_SESSION['prenom']) ?></span></h3>
         <form action="index.php?page=logout" method="POST">
            <input class="primary-button" type="submit" name="logout" value="Se déconnecter">
        </form>
    <?php elseif (isset($_COOKIE['email'])): ?>
        <h3 class="fourth-title">Bienvenue, <span class=""><?= htmlspecialchars($_SESSION['prenom']) . ". Veuillez vous reconnecter." ?></span></h3>
       
    <?php endif; ?>
</nav>

     



