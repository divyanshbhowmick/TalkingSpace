<?php include('includes/header.php') ?>
<form role="form" enctype="multipart/form-data" method="POST" action="register.php">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your Email">
    </div>
    <div class="form-group">
        <label>Choose Username</label>
        <input class="form-control" name="username" placeholder="Create a username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter your Password">
    </div>
    <div class="form-group">
        <label>Confirm Your Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Enter your Password Again!">
    </div>
    <div class="form-group">
        <label>Upload Avatar</label>
        <input type="file" id="exampleInputFile" name="avatar">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="form-group">
        <label>About Me</label>
        <textarea name="about" id="about" cols="80" rows="6" class="form-control" placeholder="Tell us about Yourself"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Register" name="register" />
</form>
<?php include('includes/footer.php') ?>