<?php
include 'connect.php';
define('UPLPATH', 'img/')
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
        <div class="link2">
            <a href="administracija.php" class="link">
                Administracija
            </a>
        </div>
        <div class="link3">
            <a href="clanak.php" class="link">
                Članak
            </a>
        </div>
    </nav>

<main>

    <section class="sve">

        <nav class="navigation">
            <a href="#svijet" class="nav">Svijet</a>
            <a href="#lokalno" class="nav">Lokalno</a>
            <a href="#drugo" class="nav">Drugo</a>
        </nav>

        <h2 class="section-title" id="svijet">Eventi</h2>

        <?php
        $query = "SELECT * FROM vjesti WHERE arhiva=0 AND kategorija='event' LIMIT 4"; 
        $result = mysqli_query($dbc, $query); 
        $i=0; 
        while($row = mysqli_fetch_array($result)) { 
             echo '<article>'; 
                echo "<img src="" '. UPLPATH . $row['image'] . '"; 
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


    <section class="sve">
        <h2 class="section-title" id="lokalno">Lokalno</h2>


        <?php
        $query = "SELECT * FROM vjesti WHERE arhiva=0 AND kategorija='event' LIMIT 4"; 
        $result = mysqli_query($dbc, $query); 
        $i=0; 
        while($row = mysqli_fetch_array($result)) { 
             echo '<article>'; 
                echo "<img src="" '. UPLPATH . $row['image'] . '"; 
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

    <section class="sve">
        <h2 class="section-title" id="drugo">Drugo</h2>
        <?php
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