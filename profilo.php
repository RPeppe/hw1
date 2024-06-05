<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
   
   $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
   $query = "SELECT COUNT(id) FROM commenti";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      echo "Error executing query: " . mysqli_error($conn);
    } else {

      $row = mysqli_fetch_row($result);
      $numberOfComments = $row[0]; 
    }
    
   for($i=1; $i<=$numberOfComments;$i++){
      $stringa = "checkbox-".$i;
      if(!empty($_POST[$stringa])) 
      {
         $query1 = "DELETE FROM commenti WHERE id = $i";
         $query2 = "CREATE TEMPORARY TABLE temp SELECT id_c, commento FROM commenti";
         $query3 = "DROP TABLE commenti";
         $query4 = "CREATE TABLE commenti (id INT AUTO_INCREMENT PRIMARY KEY, id_c INT, commento varchar(255))";
         $query5 = "INSERT INTO commenti (id_c, commento) SELECT id_c, commento FROM temp";
         $query6 = "DROP TABLE temp";
 
         mysqli_query($conn, $query1) or die(mysqli_error($conn));
         mysqli_query($conn, $query2) or die(mysqli_error($conn));
         mysqli_query($conn, $query3) or die(mysqli_error($conn));
         mysqli_query($conn, $query4) or die(mysqli_error($conn));
         mysqli_query($conn, $query5) or die(mysqli_error($conn));
         mysqli_query($conn, $query6) or die(mysqli_error($conn));
      }
   }
?>

<!DOCTYPE html>
<html>
   <?php 
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM clienti WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res_1);   
    ?>
<head>
   <link rel="stylesheet" type="text/css" href="profilo.css">
   <script src="profilo.js" defer></script>
   <title>Il blog di BBVA | BBVA Italia</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <nav>
       <div id="containernav">
            <div id="navitem1" data-item="1">
                 <img id="img0" src="Img/Img0.png" />
            </div>
            <div id="navitem2" data-item="2">
                <div class="opzione1">
                    <img id="imgprofilo" src="Img/ImgProfilo.png"/>
                    <?php
                        echo "<span id='userid'>Ciao ".$userinfo['username']."</span>"; 
                    ?>
                </div>
                     <div class="opzione4">
                        <a>Menu</a><img src="Img/Img01.png" />
                     </div>
                  </div>
               </div>
               <div id="containernav2" class="hidden">
                  <div id="contenitorebarra">
                     <div id="barradiricerca">
                        <img class="Imgbarra" id="chiudi1" src="Img/ImgLente.png" />
                        <input type="text" id="cerca" placeholder="Cosa stai cercando?" ></input>
                        <img class="Imgbarra" id="chiudi2" src="Img/ImgX.png" />
                     </div>
                  </div>
               </div>
               <div id="containernav3" class="menu">
                  <h2>Scopri BBVA</h2>
                  <a href="about.php">Chi siamo</a>
                  <a href="CartadiDebito.php">Carta di debito</a>  
                  <a href="blog.php">Blog</a>
                  <a href="home.php">Vai alla home</a>
                  <a href="logout.php">Logout</a>
               </div>
            </nav>
         </header>
   <section>
        <div id="container1">
            <h1>Bentornato <?php echo $userinfo['nome']." ".$userinfo['cognome'] ?></h1>
            <h2>Caro cliente qui allegato il suo contributo nel nostro sito</h2> 
        </div>
   </section>
   <section id="bio">
      <div id="container2">
      </div>
   </section>
   <footer>
         <div id="footercontainer">
            <div id="flex-container4">
               <div class="footerlogo">
                  <img src="Img/Img0.png" />
               </div>
               <div class="footerlogo2"></div>
            </div>
            <div id="flex-container5">
               <div class="footerlink1">
                  <a>Informazioni legali</a>
               </div>
               <div class="footerlink2">
                  <a>Cookies</a>
               </div>
               <div class="footerlink3">
                  <a>Trattamento dei dati</a>
               </div>
               <div class="footerlink4">
                  <a>Documenti legali</a>
               </div>
            </div>
            <div id="flex-container6">
               <div class="footercopyright1">
                  <p>Banco Bilbao Vizcaya Argentaria S.A. - 2024</p>
               </div>
               <div class="footercopyright2">
                  <p id="opportunita">Creando opportunità</p>
               </div>
            </div>
         </div>
      </footer>
</body>
</html>