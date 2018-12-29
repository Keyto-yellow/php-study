<?php

require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = get_post('name');
    $email = get_post('email');
    $password = get_post('password');

    $dbh = get_db_connect();
    $errs = array();
    // 入力値のバリデーション
  // エラーが無ければデータを挿入
}

include_once('./views/signup_view.php');
