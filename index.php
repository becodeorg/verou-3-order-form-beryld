<?php



// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
whatIsHappening();

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


$formSubmitted = 0;

echo $formSubmitted ;
if(isset($_POST['submitBtn'])){
    $formSubmitted = true;
    echo "after $formSubmitted";
    if($formSubmitted == 1){
        handleForm($products);
    }
}

function validate()
{
    
    // This function will send a list of invalid fields back
    // var_dump("hello here is validate functn  validate() ");
    return [$_POST["email"], $_POST["streetnumber"], $_POST["zipcode"], $_POST["city"], $_POST["street"], $_POST["products"]];
    
}


function handleForm($products)
{
    
    if (isset($_POST["products"])){
        $productName = ($_POST["products"]);
        $clientAddress = ($_POST["street"]);
        $clientCity = ($_POST["city"]);
        // echo($clientAddress);
        // print_r($productName);
        echo implode( ', ' , $productName) . " Will be delivered to :  " . $clientAddress . " " . $clientCity;
        // var_dump($x["name"]);
        
        
    }
    

       // TODO: handle errors
      // TODO: handle successful submission

    // Validation (step 2)
    $invalidFields = validate();
    $notgood = false;
    foreach($invalidFields as $field){
    if (empty($field)) {
        $notgood = true;
        
        } 
        
     
    }
    if ($notgood == 1) {
        Echo "Please fill in all required fields"  ;
    }
    
}




require 'form-view.php';