
<?php require($_SERVER['DOCUMENT_ROOT']. '/app/views/partials/head.php') ?>

<div class="container">
    <h1>Update Post</h1>

    <form action="/news/update" method="POST">
        <input type="hidden" name="id" value="<?= $news['id']; ?>">
        <div class="form-group">
            <label for="">News Title</label>
            <input class="form-control" type="text" name="title" placeholder="Title" value="<?= $news['title']; ?>">
        </div>
        <div class="form-group">
            <label for="">News Body</label>
            <textarea class="form-control" type="textare" name="body" placeholder="...body"><?= $news['body']; ?></textarea>
        </div>
        <div class="form-group">
        </div>
        <div class="form-group"><button class="btn btn-primary" type="submit">Submit</button></div>
    </form>
</div>

<?php require($_SERVER['DOCUMENT_ROOT']. '/app/views/partials/footer.php') ?>