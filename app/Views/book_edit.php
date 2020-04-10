<?php include_once 'header.php'; ?>

    <div class="card border-light mt-1">
        <div class="card-body">
            <p class="h5 card-title form-inline">
                Edit a Book

                <span class="mr-auto"></span>

                <a href="<?=href('book/index/' . $book['id'])?>" class="card-title"><?=$book['title']?></a>
            </p>

            <?php show_alert()?>

            <form method="post" action="">
                <div class="form-group row">
                    <label for="title" class="col-form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input required id="title" type="text" name="title" class="form-control" value="<?=value('title', $book['title'])?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="author" class="col-form-label col-sm-2">Author</label>
                    <div class="col-sm-10">
                        <input required id="author" type="text" name="author" class="form-control" value="<?=value('author', $book['author'])?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-form-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                        <textarea required id="description" rows="7" name="description" class="form-control"><?=value('description', $book['description'])?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Update</button>
            </form>
        </div>
    </div>

<?php include_once 'footer.php'; ?>