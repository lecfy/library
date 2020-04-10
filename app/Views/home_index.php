<?php include_once 'header.php'; ?>

<?php if ($books):?>

    <div class="card-group mt-1">
        <?php foreach ($books as $book):?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?=href('book/index/' . $book['id'], $book['title'])?></h5>
                    <p class="card-text"><?=$book['description']?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?=$book['created']?></small>
                </div>
            </div>
        <?php endforeach;?>
    </div>

<?php else:?>
    <div class="alert alert-danger mt-1">No Books Found</div>
<?php endif;?>

<?php include_once 'footer.php'; ?>