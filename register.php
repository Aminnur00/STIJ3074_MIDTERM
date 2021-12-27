<?php
    
    if(isset($_POST["submit"])){
        include 'dbconnect.php';
        $contact = $_POST["contact"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $deposit = $_POST["deposit"];
        $date = $_POST["date"];
        $state = $_POST["state"];
        $area = $_POST["area"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $sqlregister = "INSERT INTO `datas`( `contact`, `title`, `description`, `price`, `deposit`, `state`, `area`, `date`, `latitude`, `longitude`)
         VALUES('$contact', '$title', '$description', '$price', '$deposit' , '$state', '$area','$date', '$latitude', '$longitude')";
    
    try {
        $conn->exec($sqlregister);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
            uploadImage($id);
        }
        echo "<script>alert('Registration successful')</script>";
        echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Registration failed')</script>";
        echo "<script>window.location.replace('register.php')</script>";
    }
}
        function uploadImage($id){
            $target_dir = "../res/images/";
            $target_file = $target_dir . $id . ".png";
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--ViewPort-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--W3css References-->
    <link rel="stylesheet" href="style/style.css">
    <script scr="../javascript/script.js"></script>
    <style>
        body,html {height: 100%;}
        body,h1,h2,h3,h4,h5,h6 {font-family: 'Times New Roman', Georgia, serif;}
        
        @media screen and (min-width: 1920px) {
            body {
                max-width: 60%;
                margin: auto;
            }
        }
        .bgimg1 {
            background-position: center;
            background-size: cover;
            background-image: url("header1.jpg");
            min-height: 75%;
        }
    </style>
    <title>Rent a Room</title>
</head>
<body>
    <!--Navbar on top-->
    <div class ="w3-bar w3-sand w3-padding w3-card" style="letter-spacing: 3px;">
        <a href="index.html" class="w3-bar-item w3-button">Rent a Room</a>
        <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-right">Login</a>
        <a href="register.php" class="w3-bar-item w3-button w3-hide-small w3-right">Sign Up</a>
        <a href="#location" class="w3-bar-item w3-button w3-hide-small w3-right">LOCATION</a>
        <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-right">CONTACT US</a>
        <a href="#menu" class="w3-bar-item w3-button w3-hide-small w3-right">MENU</a>
        <a href="#about" class="w3-bar-item w3-button w3-hide-small w3-right">ABOUT US</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
    </div>

    <!--Right-sided navbar Dropdown menu. Shows on small screen-->
    <div id="idnavbar" class="w3-bar-block w3-sand w3-hide w3-hide-large w3-hide-medium">
        <a href="#about" class="w3-bar-item w3-button w3-center">ABOUT US</a>
        <a href="#menu" class="w3-bar-item w3-button w3-center">MENU</a>
        <a href="#contact" class="w3-bar-item w3-button w3-center">CONTACT US</a>
        <a href="#location" class="w3-bar-item w3-button w3-center">LOCATION</a>
        <a href="login.php" class="w3-bar-item w3-button w3-center">Login</a>
        <a href="register.php" class="w3-bar-item w3-button w3-center">Sign Up</a>
    </div>

    <!--Page Header-->
    <header id="header" class="bgimg1 w3-display-container w3-greyscale-min">
        <div class="w3-display-middle w3-center">
            <h1 class="w3-text-white" style="font-size: calc(30px + 5vw);" style="text-shadow: 1px 1px #444;">Rent a Room<br></h1>
            <h5 class="w3-cursive w3-text-white" style="font-size: calc(10px + 4vw);" style="text-shadow: 1px 1px #444;">-Where cozy memory lasts-</h5>
        </div>
        <div class="w3-display-bottomright w3-center w3-padding-large w3-hide-small">
            <h4 class="w3-text-white w3-tag">Location at Temerloh and nearby area</h4>
        </div>
        <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
            <h4 class="w3-text-white w3-tag">Contact us to start renting</h4>
        </div>
      </header>
    </div>

    <!--Sign UP Form-->
    <div class="w3-container w3-padding-64 form-container">
        <div class="w3-card">
            <div class="w3-container w3-sand">
        
                <p>Please fill in this form to start renting your room.</p>
    </div>
        <form name="signupForm" class="w3-container w3-padding" action="register.php" method="post" onsubmit="return confirmDialog()" enctype="multipart/form-data">
            <div class="w3-container w3-border w3-center w3-padding">
            <img class="w3-image w3-round w3-margin" src="../res/images/profile.png" style="width:100%; max-width:600px"><br>
                    <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
                </div>

            <p>
                <label class="w3-text-black"><b>Contact</b></label>
                <input class="w3-input w3-border w3-round" name="contact" type="contact" id="idcontact" >
            </p>  

            <p>
                <label class="w3-text-black"><b>Title</b></label>
                <input class="w3-input w3-border w3-round" name="title" type="text" id="idtitle" >
            </p> 

            <p>
                <label class="w3-text-black"><b>Description</b></label>
                <input class="w3-input w3-border w3-round" name="description" type="text" id="iddescription" >
            </p> 

            <p>
                <label class="w3-text-black"><b>Price</b></label>
                <input class="w3-input w3-border w3-round" name="price" type="text" id="idprice" >
            </p> 

            <p>
                <label class="w3-text-black"><b>Deposit</b></label>
                <input class="w3-input w3-border w3-round" name="deposit" type="text" id="iddeposit" >
            </p> 

            <p>
                <label class="w3-text-black"><b>Date</b></label>
                <input class="w3-input w3-border w3-round" name="date" type="date" id="iddate" >
            </p> 

            <p>
                <label class="w3-text-black"><b>State</b></label>
                <input class="w3-input w3-border w3-round" name="state" type="text" id="idstate" >
            </p> 

            <p>
                <label class="w3-text-black"><b>Area</b></label>
                <input class="w3-input w3-border w3-round" name="area" type="text" id="idarea" >
            </p> 

            <p>
                <label class="w3-text-black"><b>Latitude</b></label>
                <input class="w3-input w3-border w3-round" name="latitude" type="text" id="idlatitude" >
                
            </p> 

            <p>
                <label class="w3-text-black"><b>Longitude</b></label>
                <input class="w3-input w3-border w3-round" name="longitude" type="text" id="idlongitude" >
            </p> 

            <p>
                <button class='w3-btn w3-round w3-brown w3-block' name="submit">Submit</button>
            </p>


    </form>
    </div>
    </div>

<!--Footer-->
<footer class="w3-container w3-center w3-sand">
    <p>Copyright: Rent a Room</p>
</footer>

    </body>
</html>
