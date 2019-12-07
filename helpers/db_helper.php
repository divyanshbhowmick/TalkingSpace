<?php //require_once($_SERVER['DOCUMENT_ROOT'] . '/Learning/talkingspace/libraries/Database.php'); 
?>
<?php
function replyCount($topic_id)
{
    $db = new Database;
    $db->query('SELECT * FROM replies WHERE topic_id = topic_id');
    $db->bind(':topic_id', 'topic_id');

    $rows = $db->resultset();

    return $db->rowCount();
}
function getCategory()
{
    $db = new Database;
    $db->query('SELECT * FROM category');

    $results = $db->resultset();
    return $results;
}
function userPostCount($user_id)
{
    $db = new Database;
    $db->query('SELECT * FROM topics WHERE user_id = :user_id');
    $db->bind(':user_id', $user_id);
    $rows = $db->resultset();

    $topic_count = $db->rowCount();

    $db->query('SELECT * FROM replies WHERE user_id = :user_id');
    $db->bind(':user_id', $user_id);
    $rows = $db->resultset();

    $reply_count = $db->rowCount();
    return $topic_count + $reply_count;
}
