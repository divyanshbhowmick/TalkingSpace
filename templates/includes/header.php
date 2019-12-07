<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Welcome to Talking Space</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/" />
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="js/bootstrap.js"></script> -->
    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URI; ?>templates/css/bootstrap.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URI; ?>templates/css/custom.css" rel="stylesheet" />
    <?php
    if (!isset($title)) {
        $title = SITE_TITLE;
    }
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Talking Space</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-toggler-right">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if (!isLoggedIn()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Create An Account</a>
                </li>
                <?php else : ?>
                <li class="nav-item ">
                    <a class="nav-link" href="create.php">Create Topic</a>
                </li>
                <?php endif;  ?>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="main-col">
                    <div class="block">
                        <h1 class="pull-left"><?php echo $title ?></h1>
                        <h4 class="pull-right">A simple PHP Forum</h4>
                        <div class="clearfix"></div>
                        <hr />
                        <?php displayMessage(); ?>