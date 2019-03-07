<?php

function readMore($content, $limit) {
  $content = substr($content,0,$limit);
  $content = substr($content,0,strrpos($content,' '));
  return $content;
}
?>

<?php require('../inc/functions.php'); require('../inc/timeago.php') ?>
<div class="container" style="margin-top: 5%">
  <div class="row">
    <div class="col-md-12">
      <center>
        <div id="bannerAd">
          <img src="assets/img/ads/big.png" class="img-responsive" width="100%">
        </div>
      </center>
    </div>
    
  </div>
    <div class="row" style="margin-top: 5%">
        <section class="col-sm-12">
             
            <article class="uk-article">
              <?php 
          $sql_news = $dbh->prepare("SELECT  * FROM news where news_id =? ");
          if($sql_news->execute(array( $_POST["news_id"]))){
          foreach ($sql_news->fetchAll(PDO::FETCH_OBJ) as  $news) {
          ?>
                
           <center>
             <div class="col-md-10">
             <img src="assets/img/blog/<?php echo($news->img) ?>" alt="" class="card-img-top" width="70%">
           </div>
           </center>

                <h1 class="uk-article-title"><a class="uk-link-reset" href=""><?php echo($news->title); ?></a></h1>
                  <img src="assets/img/blog/ico/<?php echo ($news->ico) ?>" alt="" class="blog-auth-lst">

                                    <a href="#" class="blog-auth-nm">by <?php echo($news->author); ?></a>

                <div><?php echo($news->news); ?></div>
                <?php
            
          }
          }
          $sql_comment_cnt = $dbh->prepare("SELECT COUNT(*) FROM comment where news_id=?"); 
          $sql_comment_cnt->execute(array( $_POST["news_id"]));
          ?>

                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                    <div>
                        <a href="#" class="uk-button uk-button-text"> <span uk-icon="icon: clock"></span> <?php echo conv(($news->uploaded)) ?> </a> | 
                        <a class="uk-button uk-button-text" href="#"> <span uk-icon="icon: comment"></span> <?php echo($sql_comment_cnt->fetchColumn()); if($sql_comment_cnt->fetchColumn() < 1) echo(" Comment"); else echo(" Comments");?></a> 
                    </div>
                </div>
                <hr/>
                <section id="comments">
                  <?php 
                  $sql_comment = $dbh->prepare("SELECT * FROM comment where news_id= ?");
                  $sql_comment->execute(array($_POST["news_id"]));
                  foreach ($sql_comment->fetchAll(PDO::FETCH_OBJ) as  $comment) {
                    ?>
                    <div class="comment uk-padding-small" style="margin-top: 2%; background: #f2f2f2">
                        <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#"><?php echo($comment->author); ?></a></h4>
                                
                            </div>
                        </header>
                        <div class="uk-comment-body" style="margin-left: 1%; ">
                            <p><?php echo($comment->description); ?> </p>

                            <p class="uk-text-meta"><?php echo conv(($comment->uploaded)); ?></p>

                        </div>
                    </div>

                    <?php
                    # code...
                  }
                   ?>
                    
                </section>
                <section class="col-md-8" style="margin-top: 2%">
                    <h4>Leave Comment</h4>

                    <form id="commentForm">
                      <div class="uk-margin">
                        <input class="uk-input uk-form-width-1-1 uk-form-small" name="name" id="author" type="text" placeholder="Your Name">
                      </div>
                      <div class="uk-margin">
                          <input class="uk-input uk-form-width-1-1 uk-form-small" name="email" id="email" type="text" placeholder="Your Email">
                      </div>
                      <div class="uk-margin">
                          <textarea class="uk-textarea" id="comment" name="comment" rows="5" placeholder="Your Comment"></textarea>
                      </div>
                      <div class="uk-margin">
                        <input type="text" name="id" id="postId" value="<?php echo $_POST["news_id"] ?>" hidden>
                        <button class="btn btn-primary" type="submit">Send Comment</button>
                      </div>
                    </form>
                </section>

            </article>
        </section>

    </div>

    <div class="row">
        <div class="col-md-12">
             <center>
              <div id="bannerAd" style="margin-bottom: 3%">
                <img src="assets/img/ads/big.png" width="100%" height="30px">
              </div>
            </center>
        </div>
    </div>
</div>

<script type="text/javascript">
  $("#commentForm").submit(function(e){
    e.preventDefault();
    var name = $("#author").val();
    var email = $("#email").val();

      $.ajax({

        url: "files/addComment.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
        {
          UIkit.notification({
            message: '<span uk-icon=\'icon: success\'> </span> Comment Posted! ',
            status: 'success',
            pos: 'top-right',
            timeout: 3000
          });
          alert(data);
          $("#comments").load('files/comments.php?id='+<?php echo $_POST["news_id"] ?>);
        },
        error: function() 
        {
          alert(data);
        }           
   });
    
  });
</script>