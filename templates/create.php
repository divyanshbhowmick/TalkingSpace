<?php include('includes/header.php') ?>
<form role="form" method="POST" action="create.php">
    <div class="form-group">
        <label>Topic Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter the Post Title">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <?php foreach (getCategory() as $category) : ?>
            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Topic Body</label>
        <textarea name="body" id="body" cols="80" rows="10" class="form-control"></textarea>
        <script>
            CKEDITOR.replace('body');
        </script>
    </div>
    <input type="submit" class="btn btn-primary" value="Register" name="do_create" />
</form>
<?php include('includes/footer.php') ?>