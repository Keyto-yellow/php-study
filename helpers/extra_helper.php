<?php

function html_escape($word)
{
    return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

function get_post($key)
{
    if (isset($_POST[$key])) {
        $var = trim($_POST[$key]);
        return $var;
    }
}

function check_words($word, $length)
{
    if (mb_strlen($word) === 0) {
        return false;
    } elseif (mb_strlem($word) > $length) {
        return false;
    } else {
        return true;
    }
}

function insert_member_data($dbh, $name, $email, $password)
{
    $password = password_hash($password, $PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO members (name, email, password, created) VALUE (:name, :password, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('password', $password, PDO::PARAM_STR);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
