
<?php ob_start(); ?>

<div class="main-layout">
    <div class="content-area">
        <h1>Derniers Posts</h1>
        
        <?php foreach ($posts as $post): ?>
            <div class="card post-card">
                <div class="post-content">
                    <h2>
                        <a href="<?= BASE_URL ?>/post/show/<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
                    </h2>
                    <?php if ($post['image']): ?>
                        <img src="<?= BASE_URL . '/public/' . $post['image'] ?>" alt="Post image" class="post-image">
                    <?php endif; ?>
                    <p class="post-meta">Posté par <?= htmlspecialchars($post['author_name']) ?> le <?= $post['created_at'] ?></p>
                    <a href="<?= BASE_URL ?>/post/show/<?= $post['id'] ?>" class="post-link">Voir les commentaires</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="sidebar-area">
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="card">
                <h2 class="nouveau-texte">Créer un post</h2>
                <form action="<?= BASE_URL ?>/post/create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="title" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image (optionnel)</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%;">Publier</button>
                </form>
            </div>
        <?php else: ?>
            <div class="alert-info">
                Connectez-vous pour poster !
            </div>
        <?php endif; ?>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require 'layout.php'; 
?>
