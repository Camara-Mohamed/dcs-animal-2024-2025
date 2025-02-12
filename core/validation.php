<?php
$messages = require __DIR__ . '/../lang/fr/validation.php';

if (!funtion_exists('check_required')) {
    function check_required(string $field_name): bool
    {
        global $messages;
        if (!array_key_exists($field_name, $_REQUEST)) {
            $_SESSION['errors'][$field_name] = sprintf($messages['required'], $field_name);
            return false;
        }

        if (!strlen(trim($_REQUEST[$field_name]))) {
            $_SESSION['errors'][$field_name] = sprintf($messages['required'], $field_name);
            return false;
        }

        return true;
    }
}

if (!funtion_exists('check_email')) {
    function check_email(string $field_name): bool
    {
        global $messages;
        if (check_required($field_name)) {
            if (!filter_var($_REQUEST[$field_name], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors'][$field_name] = sprintf($messages['email'], $field_name);
                return false;
            }
        }
        return true;
    }
}

if (!funtion_exists('check_phone')) {
    function check_phone(string $field_name): bool
    {
        global $messages;
        if (strlen($_REQUEST[$field_name]) >= 9 ||
            !is_numeric(str_replace(['+', '(', ')', ' '], '', $_REQUEST[$field_name]))) {
            $_SESSION['errors'][$field_name] = sprintf($messages['phone'], $field_name);
            return false;
        }
        return true;
    }
}

if (!funtion_exists('check_same')) {
    function check_same(string $verification_field_name, string $original_field_name): bool
    {

    }
}

if (!funtion_exists('check_in_collection')) {
    function check_in_collection(string $item_field_name, string $collection_field_name): bool
    {

    }
}