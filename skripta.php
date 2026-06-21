<?php

$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$image=$_FILES['image']['name'];
$category=$_POST['category'];
$archive=$_POST['archive'];

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

        <div class="row"> 
            <p class="category">
                <?php 
                    echo $category; 
                ?>
            </p> 
            <h1 class="title">
                <?php 
                    echo $title; 
                ?>
            </h1> 
            <p class="ao">AUTOR:</p> 
            <p class="ao">OBJAVLJENO:</p> 
        </div> 

        <section class="about"> 
             <p> 
                 <?php 
                     echo $about; 
                 ?> 
             </p> 
        </section> 

        <section class="image"> 
             <?php 
                  echo "<img src='img/$image'"; 
             ?> 
        </section> 

        <section class="content"> 
             <p> 
                 <?php 
                     echo $content; 
                 ?> 
             </p> 
        </section> 
    </section>

    <footer>
            <div class="footer">
                <h1 class="footer1">Article</h1>    
            </div>
    </footer>
</body>
</html>

<?php

$host = "localhost";
$dbname = "ZavrsniProjekt";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error:");
}

$query = "INSERT INTO vjesti(kategorija, naslov, sazetak, slika, clanak, arhiva)
          VALUES ('$category', '$title', '$about', $image, '$content', $archive)";

?>