<?php

$host = "localhost";
$dbname = "ZavrsniProjekt";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error:");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href='https://fonts.googleapis.com/css?family=MedievalSharp' rel='stylesheet'>
    <link rel="stylesheet" media="screen" href="style.css?v=8may2013">
    <title>Projektni Zadatak</title>
    <link rel="icon" type="image/x-icon" href="images//logo.png">
</head>
<body>
    <header>
        <div class="headline">
            <h1 class="headline1">Administracija</h1>
        </div>
    </header>
    <nav class="links">
        <div class="link1">
            <a href="index.php" class="link">
                Index
            </a>
        </div>
        <div class="link1">
            <a href="unos.php" class="link">
                Unos
            </a>
        </div>
        <div class="link1">
            <a href="administracija.php" class="link">
                Administracija
            </a>
        </div>
        <div class="link1">
            <a href="clanak.php" class="link">
                Članak
            </a>
        </div>
        <div class="link1">
            <a href="kategorija.php" class="link">
               Kategorija
            </a>
        </div>
    </nav>
    
    <form action="unos.php" method="POST">
    <div class="form">
        <div class="form-item" id="naslov"> 
            <label for="title" class="korisnicko_ime">Unesite korisničko ime</label> 
            <div class="form-field"> 
                <input type="text" name="title" class="form-field-textual"> 
            </div> 
        </div>
        <div class="form-item" id="naslov"> 
            <label for="title" class="naslov">Unesite lozinku</label> 
            <div class="form-field"> 
                <input type="text" name="lozinka" class="form-field-textual"> 
            </div> 
        </div>
    </div>
    </form> 

    <?php 
        $sql="INSERT INTO korisnici (korisnicko_ime, lozinka) values (?, ?)"; 
        $stmt=mysqli_stmt_init($conn);  
        if (mysqli_stmt_prepare($stmt, $sql)){ 
            mysqli_stmt_bind_param($stmt,'ss',$korisnicko_ime,$lozinka); 
            mysqli_stmt_execute($stmt); 
        } 
        $sql = "SELECT korisnicko_ime, lozinka FROM korisnici WHERE korisnicko_ime=? AND lozinka=?"; 
        lozinka=?"; 
        $stmt=mysqli_stmt_init($conn); 
        if (mysqli_stmt_prepare($stmt, $sql)){ 
            mysqli_stmt_bind_param($stmt,'ss',$korisnicko_ime,$lozinka); 
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_store_result($stmt); 
        } 
        mysqli_stmt_bind_result($stmt, $a, $b); 
        mysqli_stmt_fetch($stmt);
        if (mysqli_stmt_num_rows($stmt)>0){
            header("Location: administracija.php");
            exit();
        }
        else{
            echo"<p class="nema">Ovaj korisnik ne postoji</p>"
            echo"<a href="registracija.php" class="nema" class="link">Registracija</a>"
        }
        ?> 


    <footer>
            <div class="footer">
                <h1 class="footer1">Administracija</h1>    
            </div>
    </footer>
</body>
</html>