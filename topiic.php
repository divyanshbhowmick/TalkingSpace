<?php require('core/init.php'); ?>

<?php
//Get the Template
$topic = new Topic;


//Get the ID from the URL
$topic_id = $_GET['id'];

if (isset($_POST['do_reply'])) {
    $data = array();
    $data['topic_id'] = $_GET['id'];
    $data['body'] = strip_tags($_POST['body']);
    $data['body'] = str_replace("\r\n", '', $data['body']);
    $data['user_id'] = getUser()['user_id'];

    $validate = new Validator;

    $field_array = array('body');

    if ($validate->isRequired($field_array)) {

        //Register User
        if ($topic->reply($data)) {
            redirect('topiic.php?id=' . $topic_id, 'Your reply has been posted', 'success');
        } else {
            redirect('topiic.php?id=' . $topic_id, 'Something went wrong with your reply', 'error');
        }
    } else {
        redirect('topiic.php?id=' . $topic_id, 'Your reply form is blank', 'error');
    }
}

$template = new Template('templates/topiic.php');


//Assign vars
$template->topic = $topic->getTopic($topic_id);

$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

echo $template;
?>