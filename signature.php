<?php
/**
 * Created by PhpStorm.
 * User: mihika
 * Date: 04/10/18
 * Time: 1:19 AM
 */

require 'logic.php';
require 'Form.php';
use DWA\Form;

$jobs = [
    'Partner' => 'Partner',
    'Interior Designer' => 'Interior Designer',
    'Architect' => 'Architect',
    '3D Designer' => '3D Designer',
    'Project Manager' => 'Project Manager',
    'Accountant' => 'Accountant',
];

# We'll be storing data in the session, so initiate it
session_start();

# Instantiate our objects
$form = new Form($_POST);

# Get data from form request
$name = $form->get('name');
$email = $form->get('email');
$phone = $form->get('phone');
$title = $form->get('title');
$ifwork = $form->get('ifwork');

# Validate the form data
$errors = $form->validate([
    'name' => 'required|alpha',
    'email' => 'required|email',
    'phone'=> 'digit|maxLength:12|minLength:10',
    'title'=> 'required',]

);

$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'name' => $name,
    'email' => $email,
    'phone' => $phone ?? null,
    'title' => $title,
    'ifwork' => $ifwork,
];

//header('Location: index.php');
