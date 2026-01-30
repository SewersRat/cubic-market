<?php
session_start();
require 'classes/Autoloader.php';
Autoloader::register();

require 'repositories/ProductRepository.php';

$productRepo = new ProductRepository();
$products = $productRepo->findAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cubic Market</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .product { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        .admin-link { margin-bottom: 20px; display: block; }
    </style>
</head>
<body>

<h1>Bienvenue sur Cubic Market</h1>

<?php if (isset($_SESSION['user'])): ?>
    <p>Connecté en tant que <?= htmlspecialchars($_SESSION['user']->getPseudo()) ?> (<?= $_SESSION['user']->getRole() ?>)</p>
    <p><a href="logout.php">Déconnexion</a></p>
    <?php if ($_SESSION['user']->getRole() === 'ROLE_ADMIN'): ?>
        <a href="admin.php" class="admin-link">Accéder au Back-Office</a>
    <?php endif; ?>
<?php else: ?>
    <p><a href="login.php">Connexion</a> | <a href="register.php">Inscription</a></p>
<?php endif; ?>

<h2>Nos Produits</h2>

<?php if (empty($products)): ?>
    <p>Aucun produit disponible pour le moment.</p>
<?php else: ?>
    <?php foreach ($products as $prod): ?>
        <div class="product">
            <h3><?= htmlspecialchars($prod['name']) ?> (<?= htmlspecialchars($prod['category']) ?>)</h3>
            <p><?= nl2br(htmlspecialchars($prod['description'])) ?></p>
            <p>Prix : <?= number_format($prod['price'], 2) ?> €</p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
