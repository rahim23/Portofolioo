<?php

$errors=["firstNameEroor" =>'',
"lastNameEroor" =>'',
"EmailEroor" =>'',
];

if(isset($_POST['submit'])   )
{
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    if( !filter_var($email ,FILTER_VALIDATE_EMAIL) ){
        $errors["EmailEroor"]= 'يرجي إدخال البريد الإلكتروني صحيح';
    }

    if(!array_filter($errors)){
        $firstName= mysqli_real_escape_string($conn ,$_POST['firstName'] );
        $lastName = mysqli_real_escape_string($conn ,$_POST['lastName'] );
        $email= mysqli_real_escape_string($conn ,$_POST['email'] );
        $sql="INSERT INTO users(firstName,lastName,email)
            VALUES('$firstName' , '$lastName' ,  '$email')" ;
    if(! (mysqli_query($conn,$sql)))
    {
        echo'Error : '.mysqli_error($conn); 
    }
    




}


}

