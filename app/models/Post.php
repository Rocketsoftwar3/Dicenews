
<?php
require_once __DIR__ . '/../core/Database.php';

class Post {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $sql = "SELECT p.*, u.username as author_name
                FROM posts p
                JOIN users u ON p.author_id = u.id
                ORDER BY p.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function create($title, $description, $image, $author_id) {
        $stmt = $this->db->prepare("INSERT INTO posts (title, description, image, author_id) VALUES (:title, :description, :image, :author_id)");
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'author_id' => $author_id
        ]);
    }

    public function findById($id) {
        $sql = "SELECT p.*, u.username as author_name
                FROM posts p
                JOIN users u ON p.author_id = u.id
                WHERE p.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }


}
