<?php
include('connection.php');
include("Client.php");

$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$passwordValue = "";
$errorMesage = "";
$successMesage = "";

if (isset($_POST["submit"])) {
    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];
    $fnameValue = $_POST["firstName"];
    $passwordValue = $_POST["password"];

    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue) || empty($passwordValue)) {
        $errorMesage = "All fields must be filled out!";
    } elseif (strlen($passwordValue) < 8) {
        $errorMesage = "Password must contain at least 8 characters!";
    } elseif (!preg_match("/[A-Z]+/", $passwordValue)) {
        $errorMesage = "Password must contain at least one capital letter!";
    } else {
        $conn = new Connection();

        $conn->selectDatabase("chapitre4db");

        $newClient = new Client($fnameValue, $lnameValue, $emailValue, $passwordValue);

        $newClient->insertClient("Clients", $conn->connexion);

        $successMesage = Client::$successMsg;
        $errorMesage = Client::$errorMsg;

     
        
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>CRUD</title>
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
 <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 <div class="container my-5 ">
 <h2>SIGN UP</h2>
 <?php
 if(!empty($errorMesage)){
 echo "<div class='alert alert-warning alert-dismissible fade show'
role='alert'>
 <strong>$errorMesage</strong>
 <button type='button' class='btn-close' data-bs-dismiss='alert' arialabel='Close'>
 </button>
 </div>";
 }
 ?>
 <br>
<form method="post">
 <div class="row mb-3">
 <label class="col-form-label col-sm-1" for="fname">First Name:</label>
 <div class="col-sm-6">
 <input value="<?php echo $fnameValue ?>" class="formcontrol" type="text" id="fname" name="firstName">
 </div>
 </div>
<div class="row mb-3">
<label class="col-form-label col-sm-1" for="lname">Last Name:</label>
 <div class="col-sm-6">
 <input value="<?php echo $lnameValue ?>" class="formcontrol" type="text" id="lname" name="lastName">
 </div>
 </div>
<div class="row mb-3 ">
 <label class="col-form-label col-sm-1"
for="email">Email:</label>
 <div class="col-sm-6">
 <input value=" <?php echo $emailValue ?>" class="formcontrol" type="email" id="email" name="email">
 </div>
 </div>
<div class="row mb-3 ">
 <label class="col-form-label col-sm-1"
for="password">Password:</label>
 <div class="col-sm-6">
 <input class="form-control" type="password"
id="password" name="password" >
 </div>
 </div>
 <?php
if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show'
role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' arialabel='Close'>
</button>
</div>";
 }
 ?>

 <div class="row mb-3">
 <div class="offset-sm-1 col-sm-3 d-grid">
 <button name="submit" type="submit" class=" btn btnprimary">Signup</button>
 </div>
<div class="col-sm-1 col-sm-3 d-grid">
 <a class="btn btn-outline-primary" >Login</a>
 </div>
 </div>
 </form>
 
</body>
</html>