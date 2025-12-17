
<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Comment.php';


class PostController {
    public function index() {
        $postModel = new Post();
        $posts = $postModel->getAll();
        require_once __DIR__ . '/../views/home.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title =  trim($_POST['title']);
            $description = trim($_POST['description']);
            $author_id = $_SESSION['user_id'];
            $image = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetPath = $uploadDir . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $image = 'uploads/' . $fileName;
                }
            }

            $postModel = new Post();
            if ($postModel->create($title, $description, $image, $author_id)) {
                header('Location: ' . BASE_URL . '/');
                exit;
            }
        }
    }

    public function show($id = null) {
        if (!$id) {
            header('Location: ' . BASE_URL . '/');
            exit;
        }

        $postModel = new Post();
        $post = $postModel->findById($id);

        if (!$post) {
            echo "Post non trouvé.";
            return;
        }

        $commentModel = new Comment();
        $comments = $commentModel->getByPostId($id);

        require_once __DIR__ . '/../views/post.php';
    }



}
