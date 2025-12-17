<?php require_once __DIR__ . '/../../config/app.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicenews</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
</head>
<body>

    <nav class="navbar">
        <div class="container navbar-content">
            <a href="<?= BASE_URL ?>/" class="brand">Dicenews</a>
            
            <div class="nav-links">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span style="margin-right: 1rem;">Bonjour, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="<?= BASE_URL ?>/account" style="color: #4b5563; margin-right: 1rem;">Mon Compte</a>
                    <a href="<?= BASE_URL ?>/auth/logout" style="color: #ef4444;">Se déconnecter</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/auth/login">Se connecter</a>
                    <a href="<?= BASE_URL ?>/auth/register" class="btn-primary">S'inscrire</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Content injected here -->
        <?php if (isset($content)) echo $content; ?>
    </div>

</body>
</html>
