<?php require('core/init.php'); ?>

<?php
//Create Topic Object

$user = new User;
$topic = new Topic;

//Get Template & Assign Vars
$template = new Template('templates/frontpage.php');
$template->users = $user->getTotalUsers();
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategory();


echo $template;
?>