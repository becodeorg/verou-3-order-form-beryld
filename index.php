<?php

declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

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
// whatIsHappening();
$products = [
    ['name' => 'Cirrus', 'price' => 25000],
    ['name' => 'Cirrocumulus', 'price' => 24000],
    ['name' => 'Cirrostratus', 'price' =>23000],
    ['name' => 'Altocumulus', 'price' =>22000],
    ['name' => 'Altostratus', 'price' =>21000],
    ['name' => 'Nimbostratus', 'price' =>20000],
    ['name' => 'Stratocumulus', 'price' =>19000],
    ['name' => 'Stratus', 'price' =>18000],
    ['name' => 'Cumulus', 'price' =>17000],
    ['name' => 'Cumulonimbus', 'price' =>16000],
];

$totalValue = 0;
$formSubmitted = 0;

if(isset($_POST['submitBtn'])){
    $formSubmitted = true;
    if($formSubmitted == 1){
        handleForm($products);
    }
}

function validate()
{
    $datas = array(
        ["email" => ($_POST["email"]) ],
        ["street" => ($_POST["street"]) ],
        ["streetnumber" => ($_POST["streetnumber"])],
        ["city" => ($_POST["city"])],
        ["zipcode" => ($_POST["zipcode"])],
        ["products" => ($_POST["products"])],
    );
    return $datas;
    // $_POST["email"], $_POST["streetnumber"], $_POST["zipcode"], $_POST["city"], $_POST["street"], $_POST["products"],
    
}

/*TODO:  This is the answer :D : ---> <?php  print_r($_POST["street"]);?> */


function handleForm($products)
{
      // TODO: handle successful submission

    // Validation (step 2)
    $invalidFields = validate();
    $notgood = false;
    
    
    foreach($invalidFields as $field => $g ){
    if (in_array("",$g)){
        $notgood = true;
        
        }
    }
    if ($notgood == true) {
        Echo "<div class='alert alert-primary' role='alert'> Please fill in all required fields  </div>";
        
    }
    


    if (isset($_POST["zipcode"]) && 1 === preg_match("/^[0-9]{4}$/", $_POST["zipcode"]) ){
        $condi2 = 0;

    }
    else{
        Echo "<div class='alert alert-primary' role='alert'> Zipcode needs to be 4 digits number  </div>";
        $condi2 = 1 ;
    }

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL )){
        $condi1 = 0;
        Echo "<div class='alert alert-primary' role='alert'> Email need this structure : blablabla@something.com </div>";

    }
    else {
        $condi1 = 1;
    }
    
    

    if (isset($_POST["products"] )&& $notgood == 0 && $condi1== 1 && $condi2 == 0){
        $productName = ($_POST["products"]);
        $clientAddress = ($_POST["street"]);
        $clientCity = ($_POST["city"]);

        echo implode(', ' ,$productName) . " Will be delivered to :  " . $clientAddress . " " . $clientCity;
        
        
    }
}




require 'form-view.php';