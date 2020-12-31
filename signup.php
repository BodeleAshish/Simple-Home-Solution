<?php

    include('templates/db_connect.php');

    $fname = $lname = $email = $password = "";
    $errors = ['fname' => '', 'lname' => '', 'email' => '', 'password' => ''];
    $notMatch = ['fname' => '', 'lname' => '', 'email' => '', 'password' => ''];
    
    if(isset($_POST['register'])) {

        if(empty($_POST['first_name'])) {
            echo 'Please enter first name <br>';
        } else {
            $fname = $_POST['first_name'];
            if(!(preg_match('/^[a-z]{1,20}$/i', $fname))){
                $errors['fname'] = 'First Name should contain only letters and less than 20 characters<br>';
                echo $errors['fname'];
                $notMatch['fname'] = 'true';
            }
        }
        if(empty($_POST['last_name'])) {
            echo 'Please enter last name <br>';
        } else {
            $lname = $_POST['last_name'];
            if(!(preg_match('/^[a-z]{1,20}$/i', $lname))) {
                $errors['lname'] = 'Last Name should only contain letter and less than 20 characters<br>';
                echo $errors['lname'];
                $notMatch['lname'] = 'true';
            }
        }
        if(empty($_POST['email'])) {
            echo 'Please enter email <br>';
        } else {
            $email = $_POST['email'];
            if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
                $errors['email'] = 'Enter valid email <br>';
                echo $errors['email'];
                $notMatch['email'] = 'true';
            }
        }
        if(empty($_POST['password'])) {
            echo 'Please enter password <br>';
        } else {
            $password = $_POST['password'];
            if(!(preg_match('/^[a-z\d-]{8,20}$/', $password))) {
                $errors['password'] = 'Last Name should only contain letter and less than 20 characters<br>';
                echo $errors['password'];
                $notMatch['password'] = 'true';
            }
        }
    }

    // echo var_dump(empty(array_filter($errors)) );
    // print_r($errors);
    // echo $errors['fname'];

    if(array_filter($errors)) {
        //reveal errors under the inputs
        print_r($errors);
    } else if( (isset($_POST['register'])) ) {
        //escape sql chars
        $fname = mysqli_real_escape_string($conn,$_POST['first_name']);
        $lname = mysqli_real_escape_string($conn,$_POST['last_name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        //create sql
        //$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";
        $sql = "INSERT INTO users(first_name,last_name,email,password) VALUES('$fname','$lname','$email','$password')";

        //save to db and check
        if(mysqli_query($conn,$sql)) {
            //success
            echo "<script>".
                 "alert(\"Account created succesffuly, Please Login again.\");".
                 "location.href = \"index.php\"".
                 "</script>";
        } else {
            echo 'query_error: ' . mysqli_error($conn);
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <title>Registration Form</title>
        <link rel="stylesheet" href="./signup.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="validation.js" defer></script>
    </head>

    <body>
    <div class="signup-form">
        <form action="signup.php" method="post" class="needs-validation" novalidate>
            <h2>Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>      	
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <!-- <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>         -->
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="register">Register Now</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="./index.php">Sign in</a></div>
    </div>

    </body>
</html>  