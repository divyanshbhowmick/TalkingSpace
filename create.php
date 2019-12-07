<?php require('core/init.php') ?>

<?php
$topic = new Topic;

$validate = new Validator;

if (isset($_POST['do_create'])) {
    $data = array();
    $data['title'] = $_POST['title'];
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category'];
    $data['user_id'] = getUser()['user_id'];
    $data['last_activity'] = date('Y-m-d H:i:s');

    $fields_array = array('title', 'body', 'category');

    if ($validate->isRequired($fields_array)) {
        if ($topic->create($data)) {
            redirect('index.php', 'Your topic has been posted', 'Success');
        } else {
            redirect('topiic.php?id=' . $topic_id, 'Something went wrong', 'error');
        }
    } else {
        redirect('create.php', 'Please fill in all details', 'error');
    }
}

//Get the Template
$template = new Template('templates/create.php');

//Assign vars
echo $template;

?>
