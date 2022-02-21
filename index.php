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
// whatIsHappening();

// TODO: provide some products (you may overwrite the example)
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
    // print_r($datas[1]) ;
    // print_r(array_keys($datas));
    
    // echo "one-----------";
    // var_dump( $datas);
    // echo "here too";
    // key($datas);
    // This function will send a list of invalid fields back
    // var_dump("hello here is validate functn  validate() ");
    return $datas;
    // $_POST["email"], $_POST["streetnumber"], $_POST["zipcode"], $_POST["city"], $_POST["street"], $_POST["products"],
    
}


function handleForm($products)
{
    
    
    

       // TODO: handle errors
      // TODO: handle successful submission

    // Validation (step 2)
    $invalidFields = validate();
    
 
    // var_dump($invalidFields);
    $notgood = false;
    
    echo 'here';
    echo $notgood;
    foreach($invalidFields as $field => $g ){
        print_r($g);
        echo $notgood;
    // if (empty($field)) 
    // if(in_array("",$g)){echo "helloimhere";}
    if (in_array("",$g)){
        $notgood = true;
        var_dump ($g);
        }
    }
    if ($notgood == true) {
        Echo "Please fill in all required fields"  ;
    }
    


    if (isset($_POST["zipcode"]) && 1 === preg_match("/^[0-9]{4}$/", $_POST["zipcode"]) ){
        echo "that's alright !";

    }
    else{
        echo "Zipcode needs to be 4 digits number ";
    }

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL )){
       echo " not good lar ! ";
    }
    






















    if (isset($_POST["products"] )&& $notgood == 0){
        $productName = ($_POST["products"]);
        $clientAddress = ($_POST["street"]);
        $clientCity = ($_POST["city"]);
        // echo($clientAddress);
        // print_r($productName);
        echo implode( ', ' , $productName) . " Will be delivered to :  " . $clientAddress . " " . $clientCity;
        // var_dump($x["name"]);
        
        
    }
}




require 'form-view.php';