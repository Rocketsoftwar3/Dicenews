
<?php ob_start(); ?>

<div class="card post-detail">
    <h1 class="post-title"><?= htmlspecialchars($post['title']) ?></h1>
    
    <?php if ($post['image']): ?>
        <img src="<?= BASE_URL . '/public/' . $post['image'] ?>" alt="Post image" class="post-image" style="max-height: 500px; width: auto; margin: 0 auto 1.5rem auto;">
    <?php endif; ?>
    
    <p class="post-description"><?= nl2br(htmlspecialchars($post['description'])) ?></p>
    
    <div class="post-meta" style="border-top: 1px solid #e5e7eb; padding-top: 1rem;">
        <span>Posté par <strong><?= htmlspecialchars($post['author_name']) ?></strong></span>
        <span style="margin: 0 0.5rem;">•</span>
        <span><?= $post['created_at'] ?></span>
    </div>
</div>

<!-- Section Commentaires -->
<div class="comments-section">
    <h3 class="comments-title">Commentaires</h3>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <form action="<?= BASE_URL ?>/comment/create" method="POST" style="margin-bottom: 2rem;">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <textarea name="content" required placeholder="Votre commentaire..." class="form-control" style="margin-bottom: 0.5rem;"></textarea>
            <button type="submit" class="btn-primary">Commenter</button>
        </form>
    <?php else: ?>
        <div class="alert-info" style="margin-bottom: 2rem;">
            <a href="<?= BASE_URL ?>/auth/login" style="text-decoration: underline;">Connectez-vous</a> pour commenter.
        </div>
    <?php endif; ?>

    <div class="comments-list">
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <div class="comment-header">
                    <span class="comment-author"><?= htmlspecialchars($comment['author_name']) ?></span>
                    <span class="comment-date"><?= $comment['created_at'] ?></span>
                </div>
                <p class="comment-text"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
            </div>
        <?php endforeach; ?>
        
        <?php if (empty($comments)): ?>
            <p style="text-align: center; color: #6b7280; font-style: italic;">Aucun commentaire pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require 'layout.php'; 
?>
