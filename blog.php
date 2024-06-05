<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

   $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
   $query1 = "SELECT MAX(id) FROM commenti";
   $result1 = mysqli_query($conn, $query1);

   if (!$result1) {
      echo "Error executing query: " . mysqli_error($conn);
    } else {

      $row = mysqli_fetch_row($result1);
      $maxindice = $row[0]; 
    }
   
   $query2="ALTER TABLE commenti AUTO_INCREMENT = $maxindice";
   mysqli_query($conn, $query2) or die(mysqli_error($conn));

   if(isset($_POST['commento'])) 
      {
         $commento = mysqli_real_escape_string($conn, $_POST['commento']);
         $query = "INSERT INTO commenti (id_c, commento ) VALUES('$userid', '$commento')";
         mysqli_query($conn, $query) or die(mysqli_error($conn));
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
   <link rel="stylesheet" type="text/css" href="blog.css">
   <script src="blog.js" defer></script>
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
                  <a href="home.php">Vai alla home</a>
                  <a href="profilo.php">Il mio account</a>                  
                  <a href="logout.php">Logout</a>
               </div>
            </nav>
         </header>
   <section>
        <div id="container1">
            <h1>BBVA Blog</h1>
            <h2>Approfondimenti, news e consigli di educazione finanziaria</h2> 
        </div>
   </section>
   <section>
      <div id="container2">
         <div id="divnotizie">
            <div id="flex-container1">
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="1" src="Img/ImgB1.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>Cashback: il rimborso per i consumatori</h3>
                     <p>Cos'è il cashback? È un sistema di rimborso che permette di guadagnare sugli acquisti. Scopriamo la differenza tra 
                        il Cashback di Stato e il Cashback BBVA.
                     </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="2" src="Img/ImgB2.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>Un’estate di promozioni con BBVA</h3>
                     <p>Quest'estate BBVA rinnova le proprie promozioni per i nuovi clienti: possibilità di guadagnare 
                        sugli acquisti con il cashback e nuove condizioni
                        per chi invita amici e familiari in BBVA con il programma Passaparola. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB3.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>Goditi al massimo l'estate con BBVA</h3>
                     <p>Quest'estate approfitta delle promozioni cashback e Passaparola BBVA. Inoltre, 
                        viaggia con il conto corrente e la carta a zero spese. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB4.png">
                  </div>
                  <div class="notizia2">
                     <h3>Black Friday: come proteggersi durante lo shopping pre-natalizio</h3>
                     <p>Scopri 6 preziosi consigli per effettuare acquisti sicuri e intelligenti durante il Black Friday.
                        Proteggi il tuo portafoglio da frodi e truffe e massimizza il tuo risparmio per un Black 
                        Friday senza preoccupazioni. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB5.png">
                  </div>
                  <div class="notizia2">
                     <h3>Con le promozioni e i servizi BBVA il Black Friday è differente</h3>
                     <p>Come ogni anno a novembre, il Black Friday sancisce l’inizio del periodo delle grandi spese che culminano con le feste natalizie. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB6.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>Consigli per ottimizzare i tuoi acquisti di Natale</h3>
                     <p>Natale si avvicina, la magia ha inizio! Vorresti approfittare di agevolazioni 
                        per poter fare shopping in tranquillità e godere del clima natalizio? 
                        Ecco alcuni consigli. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB7.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>Lo straordinario nasce dalle piccole cose</h3>
                     <p>BBVA lancia in Italia la sua prima banca retail completamente digitale. 
                        Lo fa con una campagna che ha come protagonista Teo, 
                        primo cliente di BBVA in Italia. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB8.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>Sono più di 100 mila gli italiani che hanno scelto BBVA</h3>
                     <p>A quasi un anno dall’arrivo in Italia, BBVA ha raggiunto un totale di 108.000 nuovi clienti, 
                        superando così l'obiettivo prefissato nell'ottobre 2021. </p>
                  </div>
               </div>
               <div class="flex-container2">
                  <div class="notizia1">
                     <img class="img" data-servizio="3" src="Img/ImgB9.jpg">
                  </div>
                  <div class="notizia2">
                     <h3>BBVA: la banca online con un’offerta semplice e intuitiva</h3>
                     <p>BBVA è la banca online senza costi che offre servizi semplici, innovativi 
                        e sicuri ai propri clienti, con un conto corrente e una carta di debito a zero spese.</p>
                  </div>
               </div>
            </div>
         </div>
   </section>
   <section id="sezionecommenti">
   <h2 id="titolocommenti">Sezione commenti</h2>
      <div id="container3">
      </div>
      <div id="creacommento">
         <form method="POST">
            <input class="input" name="commento" placeholder="Commenta..." type="text"></input>
            <input type="submit" value="Invia commento"></input>
         </form>
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