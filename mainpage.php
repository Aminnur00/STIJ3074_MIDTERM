<?php
 include 'dbconnect.php';
 $sqldata = "SELECT * FROM `datas` ORDER BY id DESC";
 $stmt = $conn->prepare($sqldata);
 $stmt->execute();
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $rows = $stmt->fetchAll();

 ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--ViewPort-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--W3css References-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <div class="w3-bar w3-blue-gray">
<a href="register.php" class="w3-bar-item w3-button w3-left">New data</a>
</div>

<div class="w3-grid-template">
        <?php
        foreach ($rows as $customer) {
            $id = $customer['id'];
            $contact = $customer['contact'];
            $title = $customer['title'];
            $description = $customer['description'];
            $price = $customer['price'];
            $deposit = $customer['deposit'];
            $state = $customer['state'];
            $area = $customer['area'];
            $date= $customer['date'];
            $date= $customer['date'];
            $latitude= $customer['latitude'];
            $longitude= $customer['longitude'];
            echo "<div class='w3-center w3-padding'>";
            echo "<div class='w3-card-4 w3-dark-grey'>";
            echo "<header class='w3-container w3-blue'";
            echo "<h5>$contact</h5>";
            echo "</header>";
            echo "<div class='w3-padding'><img class='w3-image' src=../res/images/$id.png" .
            " onerror=this.onerror=null;this.src='../res/images/profile.png'"
            . " '></div>";
        echo "<div class='w3-container w3-left-align'><hr>";
            echo "<p><i class='fa fa-id-card' style='font-size:16px'></i> 
            &nbsp&nbsp$id<br>
            <i class='fa fa-phone' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$contact<br>
            <i class='fa fa-flag' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$title<br>
            <i class='fa fa-flag' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$description<br>
            <i class='fa fa-money' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$price<br>
            <i class='fa fa-money' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$deposit<br>
            <i class='fa fa-map' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$state<br>
            <i class='fa fa-map' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$area<br>
            <i class='fa fa-calendar' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$date<br>
            <i class='fa fa-globe' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$latitude<br>
            <i class='fa fa-globe' style='font-size:16px'>
            </i>&nbsp&nbsp&nbsp&nbsp$longitude<br></p><hr>";
        
             echo "</div>";
             echo "</div>";
             echo "</div>";
         }
         ?>
         </div>
        </body>
        </html>
