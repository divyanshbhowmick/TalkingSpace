<?php
function formatDate($date)
{
    $date = date("F j, Y, g:i a", strtotime($date));
    return $date;
}

function urlFormat($str)
{
    //Strip out all the whitespaces
    $str = preg_replace('/\s*/', '', $str);

    //Convert the string to all lowercase'
    $str = strtolower($str);
    //URL Encode
    $str = urlencode($str);
    return $str;
}

function is_active($category)
{
    if (isset($_GET['category'])) {
        if ($_GET['category'] == $category) {
            return 'active';
        } else {
            return '';
        }
    } else {
        if ($category == null) {
            return 'active';
        }
    }
}
