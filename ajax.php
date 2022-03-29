<?php
/**
 * A sets of ajax request action from client side.
 */
require_once 'action.php';
require_once 'helper.php';

if (class_exists('Action') && isset($_GET['action'])) {
    $action = new Action();
    $action_value = clean_input($_GET['action']) or die('');

    if ($action_value == 'login') {
        $login = $action->login();
        echo $login;
    }
}
