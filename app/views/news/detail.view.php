<?php require($_SERVER['DOCUMENT_ROOT']. '/app/views/partials/head.php') ?>


<div class="container">

    <div class="row">

      <!-- News Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?= $news['title']; ?></h1>

        <!-- Date/Time -->
        <p>Created <?= $news['created_at']; ?></p>

        <hr>


        <p><?= $news['body']; ?></p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
          <form action="/comments?id=<?= $news['id']; ?>" method="POST">
            <input type="hidden" name="news_id" value="<?= $news['id']; ?>">
              <div class="form-group">
                <textarea class="form-control" rows="3" name='body'></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <?php foreach ($comments as $comment): ?>
        <!-- Single Comment -->
        <div class="media mb-4">
          <div class="media-body">
            <h5 class="mt-0">Comment : <?= $comment['id']; ?></h5>
            <?= $comment['body'];  ?>
          </div>
        </div>
        <hr>
        <?php endforeach; ?>

          </div>
        </div>

      </div>

      </div>

    </div>
    <!-- /.row -->

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT']. '/app/views/partials/footer.php') ?>