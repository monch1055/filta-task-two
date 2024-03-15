<?php
require_once 'config/config.php';
require_once 'process.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:/');
}

if (isset($_POST['login'])) {
    $process = new processData();
    $process->login($_POST);
}

if (isset($_POST['add'])) {
    $process = new processData();
    $new     = $process->addProduct($_POST);

    if ($new) {
        header('Location:/');
    }
}

if (empty($_SESSION['loggedUser'])) {
    require_once WEBSITE . 'login.php';
} else {
    $data  = new processData();
    $view  = 'mainList';
    $route = ltrim($_SERVER['REQUEST_URI'], '/');

    if ($route == '') {
        $productList = $data->productList();
    } elseif ($route == 'add') {
        $view = 'add';
    } else {
        list($action, $id) = explode('/', $route);

        if ($action == 'edit') {
            $productDetails = $data->productDetails($id);
            $view = 'edit';
        } elseif ($action == 'delete') {
            $delete = $data->deleteProduct($id);
            $productList = $data->productList();
        }
    }

    require_once WEBSITE . $view.'.php';
}