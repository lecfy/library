<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?=$title?></title>
</head>
<body class="col-lg-8 col-sm-12 col-md-10 m-auto">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?=href()?>">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?=href()?>">All Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=href('book/add')?>">Add Book</a>
            </li>

        </ul>

        <?php if (auth()):?>

            <a href="<?=href('account')?>" class="btn btn-outline-success">Account</a>

        <?php else:?>

            <a href="<?=href('home/login')?>" class="btn btn-outline-success mr-2">Login</a>
            <a href="<?=href('home/register')?>" class="btn btn-outline-danger">Register</a>

        <?php endif;?>
    </div>
</nav>