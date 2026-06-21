<?php
include 'connect.php';
define('UPLPATH', 'img/')

$kategorija = $_POST['kategorija']
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href='https://fonts.googleapis.com/css?family=MedievalSharp' rel='stylesheet'>
    <link rel="stylesheet" media="screen" href="style.css?v=8may2013">
    <title>Projektni Zadatak</title>
    <link rel="icon" type="image/x-icon" href="image//logo.png">
</head>
<body>
    <header>
        <div class="headline">
            <h1 class="headline1">News</h1>
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
            <a href="administracija.php" class="link">
                Administracija
            </a>
        </div>
        <div class="link1">
            <a href="clanak.php" class="link">
                Članak
            </a>
        </div>
    </nav>
    <form action="kategorija.php" method="POST">
        <div class="other">
            <div class="form-item" id="kat"> 
                <label for="kategorija">Kategorija vijesti</label> 
                <div class="form-field"> 
                    <select name="kategorija" id="" class="form-field-textual"> 
                        <option value="Events">events</option> 
                        <option value="Local">local</option>
                        <option value="Other">other</option>
                    </select> 
                </div> 
            </div>
        </div>
            <div class="button">
                <div class="form-item" id="button"> 
                    <button type="reset" value="Poništi" class="ponisti">Poništi</button> 
                    <button type="submit" value="Prihvati" class="prihvati">Prihvati</button> 
                </div>
            </div>
    </form>
<main>    

    <section class="sve">
      <?php


      if($kategorija == "events"){
        echo "<h2 class="section-title" id="drugo">Eventi</h2>";
        $query = "SELECT * FROM vjesti WHERE arhiva=0 AND kategorija='eventi' LIMIT 4"; 
        $result = mysqli_query($dbc, $query); 
        $i=0; 
        while($row = mysqli_fetch_array($result)) { 
             echo '<article>'; 
                echo "<img src="" . UPLPATH . $row['image'] . "; 
                echo "<div>";
                echo  $row['naslov']; 
                echo "</div>";
                echo "<div>";
                echo  $row['sazetak']; 
                echo "</div>";
                echo "<a href="clanak.php?id='.$row['id'].'">"; 
             echo '</article>'; 


     } elseif($kategorija == "lokal"){
        echo "<h2 class="section-title" id="drugo">Lokal</h2>";
        $query = "SELECT * FROM vjesti WHERE arhiva=0 AND kategorija='lokal' LIMIT 4"; 
        $result = mysqli_query($dbc, $query); 
        $i=0; 
        while($row = mysqli_fetch_array($result)) { 
             echo '<article>'; 
                echo "<img src="" . UPLPATH . $row['image'] . "; 
                echo "<div>";
                echo  $row['naslov']; 
                echo "</div>";
                echo "<div>";
                echo  $row['sazetak']; 
                echo "</div>";
                echo "<a href="clanak.php?id='.$row['id'].'">"; 
             echo '</article>'; 


     } elseif($kategorija == "other"){
        echo "<h2 class="section-title" id="drugo">Lokal</h2>";
        $query = "SELECT * FROM vjesti WHERE arhiva=0 AND kategorija='other' LIMIT 4"; 
        $result = mysqli_query($dbc, $query); 
        $i=0; 
        while($row = mysqli_fetch_array($result)) { 
             echo '<article>'; 
                echo "<img src="" . UPLPATH . $row['image'] . "; 
                echo "<div>";
                echo  $row['naslov']; 
                echo "</div>";
                echo "<div>";
                echo  $row['sazetak']; 
                echo "</div>";
                echo "<a href="clanak.php?id='.$row['id'].'">"; 
             echo '</article>'; 
     }
    
     ?>
    </section>

</main>
    <footer>
        <div class="footer">
            <h1 class="footer1">Main page</h1>    
        </div>
    </footer>
</body>
</html>