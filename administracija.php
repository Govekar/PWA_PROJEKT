<?php 
session_start(); 
include 'connect.php'; 

 
define('UPLPATH', 'img/'); 

if (isset($_POST['prijava'])) { 
    $prijavakorisnicko_ime = $_POST['korisnicko_ime']; 
    $prijavalozinka = $_POST['lozinka']; 
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?"; 
    $stmt = mysqli_stmt_init($conn); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 's', $prijavakorisnicko_ime); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt); 
    } 
    mysqli_stmt_bind_result($stmt, $korisnicko_ime1, $lozinka1, $razina); 
    mysqli_stmt_fetch($stmt); 

    if (password_verify($_POST['lozinka'], $lozinka1) && mysqli_stmt_num_rows($stmt) > 0) { 
        $uspjesnaPrijava = true; 
 
        if($levelKorisnika == 1) { 
            $admin = true; 
        } 
        else { 
            $admin = false; 
        } 

        $_SESSION['$korisnicko_ime'] = $korisnicko_ime1; 
        $_SESSION['$level'] = $razina1; 
    } 
    else { 
        $uspjesnaPrijava = false; 
    } 
}
 
if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) { 
    $query = "SELECT * FROM vijesti"; 
    $result = mysqli_query($dbc, $query); 
    while($row = mysqli_fetch_array($result)) { 

        }  

    }
 
else if ($uspjesnaPrijava == true && $admin == false) { 
    echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
    } 

else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) { 
    echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
    } 
else if ($uspjesnaPrijava == false) { 
    <script type="text/javascript">  
    </script> 
    <?php 
    } 
    ?> 
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
            <a href="prijava.php" class="link">
                Prijava
            </a>
        </div>
        <div class="link1">
            <a href="unos.php" class="link">
                Unos
            </a>
        </div>
        <div class="link1">
            <a href="index.php" class="link">
                Index
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
    
<?php
$query = "SELECT * FROM vijesti"; 
$result = mysqli_query($dbc, $query); 
while($row = mysqli_fetch_array($result)) { 
    echo "<form enctype="multipart/form-data" action="" method="POST"> 
    <div class="form-item"> 
        <label for="title">Naslov vjesti:</label> 
        <div class="form-field"> 
            <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'"> 
        </div> 
    </div> 
    <div class="form-item"> 
        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
        <div class="form-field"> 
            <textarea name="sazetak" id="" cols="30" rows="10" class="form field-textual">'.$row['sazetak'].'</textarea> 
        </div> 
    </div> 
    <div class="form-item"> 
        <label for="content">Sadržaj vijesti:</label> 
        <div class="form-field"> 
            <textarea name="clanak" id="" cols="30" rows="10" class="form field-textual">'.$row['tekst'].'</textarea> 
        </div> 
    </div> 
    <div class="form-item"> 
        <label for="slika">Slika:</label> 
        <div class="form-field"> 
            <input type="file" class="input-text" id="slika" value="'.$row['slika'].'" name="slika"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>  
        </div> 
    </div> 
    <div class="form-item"> 
        <label for="category">Kategorija vijesti:</label> 
        <div class="form-field"> 
            <select name="kategorija" id="" class="form-field-textual" value="'.$row['kategorija'].'"> 
                <option value="sport">Event</option> 
                <option value="kultura">Lokal</option>
                <option value="kultura">Other</option>
            </select> 
        </div> 
    </div> 
    <div class="form-item"> 
        <label>Spremiti u arhivu:  
        <div class="form-field">"; 
    if($row['arhiva'] == 0) { 
        echo "<input type="checkbox" name="arhiva" id="archive"/> Arhiviraj?"; 
    } else { 
        echo "<input type="checkbox" name="arhiva" id="archive" checked/> Arhiviraj?"; 
    } 
    echo '</div> </label> 
    </div> 
    </div> 
    <div class="form-item"> 
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" name="update" value="Prihvati">Izmjeni</button> 
                <button type="submit" name="delete" value="Izbriši"> Izbriši</button> 
    </div> 
    </form>'; 
 
}
if(isset($_POST['delete'])){ 
    $id=$_POST['id']; 
    $query = "DELETE FROM vjesti WHERE id=$id "; 
    $result = mysqli_query($conn, $query); 
} 

define('UPLPATH', 'img/'); 
 
if(isset($_POST['update'])){ 
    $image = $_FILES['image']['name']; 
    $title=$_POST['title']; 
    $sazetak=$_POST['sazetak']; 
    $clanak=$_POST['clanak']; 
    $kategorija=$_POST['kategorija']; 
    if(isset($_POST['arhiva'])){ 
        $archive=1; 
    }else{ 
        $archive=0; 
    } 
    $target_dir = 'img/'.$picture; 
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir); 
    $id=$_POST['id']; 
    $query = "UPDATE vijesti SET naslov='$title', sazetak='$sazetak', tekst='$clanak', slika='$image', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id "; 
    $result = mysqli_query($dbc, $query); 
}
?>

    <footer>
            <div class="footer">
                <h1 class="footer1">Administracija</h1>    
            </div>
    </footer>
</body>
</html>