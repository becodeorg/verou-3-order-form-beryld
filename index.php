<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Cirrus', 'price' => 2500],
    ['name' => 'Cirrocumulus', 'price' => 2400],
    ['name' => 'Cirrostratus', 'price' =>2300],
    ['name' => 'Altocumulus', 'price' =>2200],
    ['name' => 'Altostratus', 'price' =>2100],
    ['name' => 'Nimbostratus', 'price' =>2000],
    ['name' => 'Stratocumulus', 'price' =>1900],
    ['name' => 'Stratus', 'price' =>1800],
    ['name' => 'Cumulus', 'price' =>1700],
    ['name' => 'Cumulonimbus', 'price' =>1600],
    
    

];

$totalValue = 0;

function validate()
{
    // This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';