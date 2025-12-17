
<?php ob_start(); ?>

<div class="auth-container" style="max-width: 600px;">
    <h1 class="form-title">Mon Compte</h1>
    
    <div class="card" style="text-align: center; padding: 2rem;">
        <div style="font-size: 3rem; margin-bottom: 1rem;">👤</div>
        <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;"><?= htmlspecialchars($_SESSION['username']) ?></h2>
        <p style="color: #6b7280; margin-bottom: 2rem;">Membre de Dicenews</p>

        <div style="border-top: 1px solid #e5e7eb; padding-top: 2rem; margin-top: 2rem;">
            <a href="<?= BASE_URL ?>/auth/logout" class="btn-primary" style="background-color: #ef4444;">Se déconnecter</a>
            <a href="<?= BASE_URL ?>/" class="btn-primary" style="background-color: #6b7280; margin-left: 1rem;">Retour à l'accueil</a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require 'layout.php'; 
?>
