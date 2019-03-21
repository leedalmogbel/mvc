
<?php require('partials/head.php') ?>

<div class="container">
<h1>News</h1>
<h3><a class="btn btn-info" href="/news/create">Create News</a></h3>
    <div class="row">
        <?php foreach ($news as $new): ?>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img src="card-img-top" alt="">
                <div class="card-body">
                    <form action="/news/delete?id=<?= $new->id; ?>" method="POST">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5><?= $new->title ?></h5>
                            <span class="pull-right"><button class="btn btn-sm btn-secondary">Delete</button></span>
                        </div>
                    </form>
                    <p><?= $new->body ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a class="link" href="news/detail?id=<?= $new->id; ?>">
                                View
                                </a>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a class="link" href="news/edit?id=<?= $new->id; ?>">
                                Edit
                                </a>
                            </button>
                    </div>
                    <small class="text-muted"><?= $new->created_at ?></small>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<?php require('partials/footer.php') ?>
