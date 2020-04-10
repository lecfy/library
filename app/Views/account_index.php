<?php include_once 'header.php'; ?>

<div class="mt-1 card border-light">
    <div class="card-body">
        <h5 class="card-title">My Account</h5>

        <?php show_alert();?>

        <p>
            User ID: <?=auth('id')?><br>
            Email: <?=auth('email')?>
        </p>

        <p>
            <a href="<?=href('account/logout')?>">End Session (Log out)</a>
        </p>

    </div>
</div>

<?php include_once 'footer.php'; ?>