<?php
require_once 'config.php';

function validate_username($field) {
    if ('' == $field) {
        return 'No username was entered.';
    } elseif (strlen($field) > 16) {
        return 'Usernames must be at most 16 characters.';
    } elseif (preg_match('/\W/', $field)) {
        return 'Only letters, numbers, and _ in usernames.';
    } else {
        $stmt = $GLOBALS['pdo']->prepare('SELECT COUNT(*) FROM users WHERE username=:username');
        $stmt->execute(['username' => $field]);
        $result = $stmt->fetchColumn();

        if ($result) {
            return 'Username is not available.';
        } else {
            return '';
        }
    }
}

function validate_password($field) {
    if ('' == $field) {
        return 'No password was entered.';
    } elseif (strlen($field) < 8) {
        return 'Passwords must be at least 8 characters.';
    } else {
        return '';
    }
}

function validate_confirmpassword($field1, $field2) {
    if ($field1 !== $field2) {
        return 'Passwords do not match.';
    } else {
        return '';
    }
}

function validate_firstname($field) {
    if ('' == $field) {
        return 'No first name was entered.';
    } elseif (strlen($field) > 32) {
        return 'First names must be at most 32 characters.';
    } else {
        return '';
    }
}

function validate_middlename($field) {
    if (strlen($field) > 32) {
        return 'Middle names must be at most 32 characters.';
    } else {
        return '';
    }
}

function validate_lastname($field) {
    if ('' == $field) {
        return 'No last name was entered.';
    } elseif (strlen($field) > 32) {
        return 'Last names must be at most 32 characters.';
    } else {
        return '';
    }
}

function validate_age($field) {
    if ('' == $field) {
        return 'No age was entered.';
    } elseif (!filter_var($field, FILTER_VALIDATE_INT, ['options' => ['min_range' => 18, 'max_range' => 128]])) {
        return 'Age must be an integer between 18 and 128.';
    } else {
        return '';
    }
}

function validate_email($field) {
    if ($field != '' && !filter_var($field, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
        return 'The email address is invalid.';
    } else {
        return '';
    }
}
?>