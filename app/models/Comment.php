
<?php
require_once __DIR__ . '/../core/Database.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByPostId($postId) {
        $sql = "SELECT c.*, u.username as author_name
                FROM comments c
                JOIN users u ON c.author_id = u.id
                WHERE c.post_id = :post_id
                ORDER BY c.created_at ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['post_id' => $postId]);
        return $stmt->fetchAll();
    }

    public function create($content, $author_id, $postId) {
        $stmt = $this->db->prepare("INSERT INTO comments (content, author_id, post_id) VALUES (:content, :author_id, :post_id)");
        return $stmt->execute([
            'content' => $content,
            'author_id' => $author_id,
            'post_id' => $postId
        ]);
    }
}
