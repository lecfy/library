<?php include_once 'header.php'; ?>

<div class="card borderlight mt-1">
    <div class="card-body">
        <p class="h5 card-title form-inline">
            <?=$book['title']?>

            <span class="mr-auto"></span>

            <a href="<?=href('book/edit/' . $book['id'])?>" class="mr-2">Edit</a>
            <a href="<?=href('book/delete/' . $book['id'])?>" onclick="return confirm('Confirm action?')">Delete</a>
        </p>
        <p class="card-title">
            Author: <?=$book['author']?>
        </p>
        <p>
            <?=$book['description']?>
        </p>
        <p>
            Published: <?=$book['created']?>
        </p>
    </div>
</div>

<?php include_once 'footer.php'; ?>