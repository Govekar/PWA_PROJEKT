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
            <h1 class="headline1">Članak</h1>
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
            <a href="kategorija.php" class="link">
                Kategorija
            </a>
        </div>
        <div class="link1">
            <a href="administracija.php" class="link">
                Administracija
            </a>
        </div>
    </nav>
    

    <section role="main"> 

         <div class="row"> 
             <h2 class="category"><?php 
                 echo "<span>".$row['kategorija']."</span>"; 
             ?>
             </h2> 
             <h1 class="title"><?php 
                 echo $row['naslov']; 
             ?>
             </h1> 
             <p>AUTOR:</p> 
             <p>OBJAVLJENO: <?php 
                 echo "<span>".$row['datum']."</span>"; 
             ?></p> 
         </div> 

         <section class="slika"> 
             <?php 
                  echo '<img src="' . UPLPATH . $row['image'] . '">'; 
             ?> 
         </section> 

         <section class="about"> 
             <p> 
             <?php 
                 echo "<i>".$row['sazetak']."</i>"; 
             ?> 
             </p> 
         </section> 

         <section class="sadrzaj"> 
             <p> 
             <?php 
                 echo $row['clanak']; 
             ?> 
             </p> 
         </section> 
    </section>

    <footer>
            <div class="footer">
                <h1 class="footer1">Članak</h1>    
            </div>
    </footer>
</body>
</html>