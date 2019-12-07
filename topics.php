<?php require('core/init.php') ?>

<?php

$topic = new Topic;

$category = isset($_GET['category']) ? $_GET['category'] : null;

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
//Get the Template
$template = new Template('templates/topics.php');

if (isset($category)) {
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Post In "' . $topic->getCategory($category)->name . '"';
}

if (isset($user_id)) {
    $template->topics = $topic->getByUser($user_id);
    // $template->title = 'Post By "' . $topic->getByUser($user_id)->id . '"';
}
if (!isset($user_id) && !isset($category)) {
    $template->topics = $topic->getAllTopics();
}

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategory();

//Assign vars
echo $template;

?>
