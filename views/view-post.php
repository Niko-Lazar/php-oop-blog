<?php require_once 'includes/header.php' ?>

<?php

require_once '../vendor/autoload.php';

\models\classes\Database::startConn();


$postID = $_GET['id'];

$token = \models\classes\Database::firstVisit();

$user = new \models\classes\User($token);

$posts = new \models\classes\Posts($user->id);

$post = $posts->getPost($postID);

$comments = new \models\classes\Comments($postID);

\models\classes\Database::closeConn();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post->title; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        By: <?php echo $user->name . " " . $user->lastName; ?>
                        <br>
                        posted: <?php echo $post->date; ?>
                    </h6>
                    <p class="card-text"> <?php echo $post->description; ?> </p>
                    <hr>
                    <p class="card-text">
                        <?php foreach($comments->comments as $comment): ?>

                            <?php echo $comment['comment']; ?>
                            <br>
                            <?php echo $comment['date']; ?>
                            <br>

                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'includes/footer.php' ?>