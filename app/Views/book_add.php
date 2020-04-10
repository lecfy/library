<?php include_once 'header.php'; ?>

<div class="card border-light mt-1">
    <div class="card-body">
        <h5 class="card-title">Add a Book</h5>

        <?php show_alert()?>

        <form method="post" action="">
            <div class="form-group row">
                <label for="title" class="col-form-label col-sm-2">Title</label>
                <div class="col-sm-10">
                    <input required id="title" type="text" name="title" class="form-control" value="<?=value('title')?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="author" class="col-form-label col-sm-2">Author</label>
                <div class="col-sm-10">
                    <input required id="author" type="text" name="author" class="form-control" value="<?=value('author')?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-form-label col-sm-2">Description</label>
                <div class="col-sm-10">
                    <textarea required id="description" rows="7" name="description" class="form-control"><?=value('description')?></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-secondary">Add</button>
        </form>
    </div>
</div>

<?php include_once 'footer.php'; ?>