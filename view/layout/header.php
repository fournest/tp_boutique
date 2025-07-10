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
 <li><a href="index.php?page=accueil" <?php if ($currentPage == 'index.php?page=accueil') {echo 'class="active"';} ?>>accueil</a></li>
 <li><a href="index.php?page=login" <?php if ($currentPage == 'index.php?page=login') {echo 'class="active"';} ?>>Se connecter</a></li>
 <li><a href="index.php?page=panier" <?php if ($currentPage == 'index.php?page=panier') {echo 'class="active"';} ?>>Panier</a></li>
<li><a href="index.php?page=historique" <?php if ($currentPage == 'index.php?page=historique') {echo 'class="active"';} ?>>historique</a></li>
 <li><a href="index.php?page=admin_produits" <?php if ($currentPage == 'index.php?page=admin_produits') {echo 'class="active"';} ?>>Tableau de bord</a></li>
 </ul>
</nav>