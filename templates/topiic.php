<?php include('includes/header.php'); ?>
<ul id="topics">
    <li id="main-topic" class="topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img src="<?php echo BASE_URI ?>images/avatars/<?php echo $topic->avatar; ?>" class="avatar pull-left" />
                    <ul>
                        <li><strong><?php echo $topic->username ?></strong></li>
                        <li><?php echo userPostCount($topic->user_id); ?> Posts</li>
                        <li><a href="<?php echo BASE_URI; ?>topics.php?user_id=<?php echo $topic->user_id; ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <p>
                        <?php echo $topic->body; ?>
                    </p>
                </div>
            </div>
        </div>
    </li>
    <?php foreach ($replies as $reply) : ?>
    <li class="topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img src="<?php echo BASE_URI ?>images/avatars/<?php echo $reply->avatar; ?>" class="avatar pull-left" />
                    <ul>
                        <li><strong><?php echo $reply->username; ?></strong></li>
                        <li><?php echo userPostCount($reply->user_id) ?>Posts</li>
                        <li><a href="<?php echo BASE_URI; ?>topics.php?user_id =<?php echo $reply->user_id; ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <p><?php echo $reply->body; ?></p>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<h3>Reply to Topic</h3>
<?php if (!isLoggedIn()) : ?>
<p> Please Login to Reply! </p>
<?php else : ?>
<form action="topiic.php?id=<?php echo $topic->id; ?>" method="post" role="form">
    <div class="form-group">
        <textarea name="body" id="reply" cols="80" rows="10" class="form-control"></textarea>
        <script>
            CKEDITOR.replace('reply');
        </script>
    </div>
    <button name="do_reply" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php endif; ?>
<?php include('includes/footer.php'); ?>