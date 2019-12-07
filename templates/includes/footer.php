</div>
</div>
</div>
<div class="col-md-4 wrapper">
    <div class="sidebar">
        <div class="block">
            <h3>Login Form</h3>
            <?php if (isLoggedIn()) : ?>
            <div class="user-data">
                Welcome, <?php echo getUser()['username'] ?>
            </div>
            <br />
            <form role="form" method="post" action="logout.php">
                <input type="submit" value="Logout" name="do_logout" class="btn btn-primary">
            </form>
            <?php else : ?>
            <form role="form" action="login.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Enter Username" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Enter Password" />
                </div>
                <button name="do_login" type="submit" class="btn btn-primary">
                    Login
                </button>
                <a class="btn btn-secondary" href="register.php">Create an Account</a>
            </form>
            <?php endif; ?>
        </div>
        <hr>
        <div class="block">
            <h3>Categories</h3>
            <div class="list-group">
                <a href="topics.php" class="list-group-item <?php echo is_active(null) ?>">All Topics<span class="badge pull-right">14</span></a>
                <?php foreach (getCategory() as $category) : ?>
                <a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id) ?>"><?php echo $category->name ?><span class="badge pull-right">4</span></a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</main>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>