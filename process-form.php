<?php
require "config.php";

function validating($phone){
    if( preg_match('/^[0-9]{10}+$/', $phone))
    {
       return True;
    }
    else{
        return false;
    }
}
$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
$valid = validating($contact_number);


$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$employment_status = $_POST['employment_type'];
$Loan_status = $_POST['existing_loan'];



if ($valid){

    $sql = "INSERT INTO lead_data(Lead_Name, Contact_number, Address, City, State_name, Employment_type, Loan_status)
        VALUES (?,?,?,?,?,?,?)";


    $stmt =mysqli_stmt_init($connection);

    if( ! mysqli_stmt_prepare($stmt,$sql)){
        die(mysqli_error($connection));
    };

    mysqli_stmt_bind_param($stmt, "sisssss",$name,$contact_number, $address, $city, $state, $employment_status, $Loan_status);

    mysqli_stmt_execute($stmt);

//echo "record saved";
    header('location:index.php');

}
else{
    echo "you provided invalid phone number. ";
    echo "<a href='add_lead_form.php'>GO BACK</a>";
}



//print $_POST;