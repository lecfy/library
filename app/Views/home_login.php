<?php include_once 'header.php';
 ?>

    <div class="card border-light mt-1">
        <div class="card-body col-lg-10 m-auto col-sm-12">
            <h5 class="card-title">Sign In</h5>

            <?php show_alert()?>

            <form method="post" action="">
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input required id="email" type="email" name="email" class="form-control" value="<?=value('email')?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input required id="password" type="password" name="password" class="form-control" value="<?=value('password')?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Login</button>
            </form>
        </div>
    </div>

<?php include_once 'footer.php'; ?>