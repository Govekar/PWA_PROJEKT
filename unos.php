<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href='https://fonts.googleapis.com/css?family=MedievalSharp' rel='stylesheet'>
    <link rel="stylesheet" media="screen" href="style.css?v=8may2013">
    <titleProjektni Zadatakt</title>
    <link rel="icon" type="image/x-icon" href="images//logo.png">
</head>
<body>
    <header>
        <div class="headline">
            <h1 class="headline1">Input</h1>
        </div>
    </header>

    <nav class="links">
        <div class="link1">
            <a href="prijava.php" class="link">
                Prijava
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
        <div class="link1">
            <a href="kategorija.php" class="link">
               Kategorija
            </a>
        </div>
    </nav>
    <form action="unos.php" method="POST">
    <div class="form">
        <div class="form-item" id="naslov"> 
            <label for="title" class="naslov">Naslov vijesti</label> 
            <div class="form-field"> 
                <input type="text" name="title" class="form-field-textual"> 
            </div> 
        </div> 
        <div class="vjesti">
            <div class="form-item" id="kratki"> 
                <label for="about">Kratki sadržaj vijesti</label> 
                <div class="form-field"> 
                    <textarea name="sazetak" id="" cols="30" rows="10" class="form-field-textual"></textarea> 
                </div> 
            </div> 
            <div class="form-item" id="dugi"> 
                <label for="content">Sadržaj vijesti</label> 
                <div class="form-field"> 
                    <textarea name="clanak" id="" cols="30" rows="10" class="form-field-textual"></textarea> 
                </div> 
            </div>
        </div>
        <div class="other">
            <div class="form-item" id="slika">
                <label for="image">Slika: </label> 
                <div class="form-field"> 
                    <input type="file" accept="image/jpg, image/png" class="input-text" name="image"/> 
                </div> 
            </div> 
            <div class="form-item" id="kat"> 
                <label for="kategorija">Kategorija vijesti</label> 
                <div class="form-field"> 
                    <select name="category" id="" class="form-field-textual"> 
                        <option value="Events">Events</option> 
                        <option value="Local">Local</option>
                        <option value="Other">Other</option>
                    </select> 
                </div> 
            </div> 
            <div class="form-item" id="check"> 
                <label>Spremiti u arhivu:  
                <div class="form-field"> 
                    <input type="checkbox" name="arhiva"> 
                </div> 
                </label> 
            </div>
        </div>
        <div class="button">
            <div class="form-item" id="button"> 
                <button type="reset" value="Poništi" class="ponisti">Poništi</button> 
                <button type="submit" value="Prihvati" class="prihvati">Prihvati</button> 
            </div>
        </div>
    </div>
    </form> 
    <footer>
            <div class="footer">
                <h1 class="footer1">Input</h1>    
            </div>
    </footer>
</body>
</html>


<?php
  include 'connect.php';

  $title=$_POST['title'];
  $sazetak=$_POST['sazetak'];
  $clanak=$_POST['clanak'];
  $image=$_FILES['image']['name'];
  $kategorija=$_POST['kategorija'];
  $date=date('d.m.Y.');
  if(isset($_POST['arhiva'])){ 
    $archive=1; 
  }else{ 
    $archive=0; 
  } 
  $target_dir = 'img/'.$image; 
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir); 
 
  $query = "INSERT INTO `vjesti` (`kategorija`, `naslov`, `sazetak`, `slika`, `clanak`, `arhiva`, `datum`) 
           VALUES ('$category', '$title', '$about', '$image', '$content', '1', '12.12.2000')";
 
  $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
  mysqli_close($dbc); 
?>