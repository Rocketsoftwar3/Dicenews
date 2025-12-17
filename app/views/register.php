
<?php ob_start(); ?>

<div class="auth-container">
    <h1 class="form-title">Inscription</h1>

    <?php if (isset($error)): ?>
        <div style="background: #fee2e2; color: #b91c1c; padding: 0.75rem; border-radius: 0.375rem; margin-bottom: 1rem;"><?= $error ?></div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/auth/register" method="POST">
        <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <button type="submit" class="btn-primary" style="width: 100%; background-color: #10b981;">S'inscrire</button>
    </form>
    <div class="form-footer">
        <a href="<?= BASE_URL ?>/auth/login">Déjà un compte ? Se connecter</a>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require 'layout.php'; 
?>
