<?php

session_start();

$hasErrors = false;

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $name = $results['name'];
    $email = $results['email'];
    $phone = $results['phone'];
    $title = $results['title'];
    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
}

session_unset();