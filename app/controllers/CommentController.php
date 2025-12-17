
<?php
require_once __DIR__ . '/../models/Comment.php';

class CommentController {
    public function create() {
         if (!isset($_SESSION['user_id'])) {
             header('Location: /login');
             exit;
         }

         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $content = trim($_POST['content']);
             $post_id = $_POST['post_id'];
             $author_id = $_SESSION['user_id'];

             if (!empty($content)) {
                 $commentModel = new Comment();
                 $commentModel->create($content, $author_id, $post_id);
             }
             
             header('Location: /post/show/' . $post_id);
             exit;
         }
    }
}
