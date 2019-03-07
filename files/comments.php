<?php require('../inc/functions.php'); 
require('../inc/timeago.php'); 

$id = $_GET['id'];

  $sql_comment = $dbh->prepare("SELECT * FROM comment where news_id= ? order by comment_id asc");
  $sql_comment->execute(array($id));
  foreach ($sql_comment->fetchAll(PDO::FETCH_OBJ) as  $comment) {
    ?>
    <div class="comment" style="background: #f2f2f2; padding: 10px; margin-top: 1%">
        <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#"><?php echo($comment->author); ?></a></h4>
            </div>
        </header>
        <div class="uk-comment-body" style="margin-left: 1%">
            <p><?php echo($comment->description); ?> </p>
            <p href="#" class="uk-comment-meta uk-margin-remove"><?php echo conv(($comment->uploaded)); ?></p>
        </div>
    </div>

    <?php
  }

 ?>