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
            <h1 class="headline1">Article</h1>
        </div>
    </header>
    <nav class="links">
        <div class="link1">
            <a href="index.html" class="link">
                Index
            </a>
        </div>
        <div class="link2">
            <a href="contacts.html" class="link">
                Contacts
            </a>
        </div>
        <div class="link3">
            <a href="news.html" class="link">
                News
            </a>
        </div>
        <div class="link4">
            <a href="store.html" class="link">
                Store
            </a>
        </div>
    </nav>

    <section class="sve"> 

        <form action="registracija.php" method="POST">
            <div class="form-item" id="naslov"> 
                <label for="title" class="naslov">Ime</label> 
                <div class="form-field"> 
                    <input type="text" name="ime" class="form-field-textual"> 
                </div> 
            </div> 
            <div class="form-item" id="naslov"> 
                <label for="title" class="naslov">Prezime</label> 
                <div class="form-field"> 
                    <input type="text" name="prezime" class="form-field-textual"> 
                </div> 
            </div>
            <div class="form-item" id="naslov"> 
                <label for="title" class="naslov">Korisničko ime</label> 
                <div class="form-field"> 
                    <input type="text" name="korisničko ime" class="form-field-textual"> 
                </div> 
            </div>
            <div class="form-item" id="naslov"> 
                <label for="title" class="naslov">Lozinka</label> 
                <div class="form-field"> 
                    <input type="text" name="lozinka" class="form-field-textual"> 
                </div> 
            </div>
            <div class="form-item" id="naslov"> 
                <label for="title" class="naslov">Razina</label> 
                <div class="form-field"> 
                    <input type="text" name="razina" class="form-field-textual"> 
                </div> 
            </div>
            <div class="button">
                <div class="form-item" id="button"> 
                    <button type="submit" value="Prihvati" class="prihvati">Prijavi se</button> 
                </div>
            </div>
         </form>

    </section>

    <footer>
            <div class="footer">
                <h1 class="footer1">Article</h1>    
            </div>
    </footer>
</body>
</html>

<?php

<?php

$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$korisnicko_ime=$_POST['korisnicko_ime'];
$lozinka=$_POST['lozinka'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH); 
$razina=$_POST['razina'];
$razina = 0; 

?>



session_start(); 
include 'connect.php'; 


$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?"; 
$stmt = mysqli_stmt_init($dbc); 
if (mysqli_stmt_prepare($stmt, $sql)) { 
    mysqli_stmt_bind_param($stmt, 's', $username); 
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_store_result($stmt); 
} 

if(mysqli_stmt_num_rows($stmt) > 0){ 
    $msg='Korisničko ime već postoji!'; 
}

else{
    $sql = "INSERT INTO vjesti(ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($dbc); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina); 
        mysqli_stmt_execute($stmt); 
        $registriranKorisnik = true; 
    }
} 

if($registriranKorisnik == true) { 
    echo '<p>Korisnik je uspješno registriran!</p>'; 
   } 
else{
   echo '<p>Pogrešan upis informacija</p>';
}

mysqli_close($conn); 


?>