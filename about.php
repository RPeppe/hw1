<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="about.css">
        <script src="about.js" defer></script>
        <title>Banca BBVA - Siamo BBVA Italia</title>
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
                           require_once 'auth.php'; 
                        
                        if ($userid = checkAuth()) {
                              $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
                              $userid = mysqli_real_escape_string($conn, $userid);
                              $query = "SELECT * FROM clienti WHERE id = $userid";
                              $res_1 = mysqli_query($conn, $query);
                              $userinfo = mysqli_fetch_assoc($res_1);  
                              echo "<span id='userid'>Ciao ".$userinfo['username']."</span>";
                        } else {
                              echo '<a href="login.php">Accedi</a>';
                        }
                        ?>
                     </div>
                     <div 
                      <?php 
                        require_once 'auth.php';
                        if ($userid = checkAuth()) {
                              echo 'class="hidden"';
                        } else {
                              echo 'class="opzione2"';
                        }
                     ?>><a href="signup.php">Apri il conto</a>
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
                  <a href="CartadiDebito.php">Carta di debito</a>
                  <a 
                     <?php 
                        require_once 'auth.php';
                        if ($userid = checkAuth()) {
                              echo 'href="home.php"';
                        } else {
                              echo 'href="index.php"';
                        }
                     ?> 
                  >Vai alla home</a>
                  <a href="logout.php">Logout</a>
               </div>
            </nav>
         </header>
        <section>
            <div id="container1">
                <h1>Piacere, siamo BBVA</h1>
            </div>
         </section>
         <section>
            <div id="container2">
               <div id="flex-container1">
                    <div class="colonnaBianca1">
                        <h2 class="titolocontainer">Un percorso di oltre 160 anni</h2>
                        <p class="storia">Quella di BBVA è la storia di una banca nata più di 160 anni fa.</p>
                        <p class="storia">
                        Lavoriamo continuamente per creare un futuro migliore per le persone ed essere un punto di riferimento solido,
                        creando rapporti duraturi.
                        </p>
                        <p class="storia">Crediamo nell’innovazione e siamo pionieri nell’adattarci a un mercato sempre più globalizzato.</p>
                        <p class="storia">Da 160 anni, puntiamo al futuro.</p>
                    </div>
                    <div class="colonnaBianca2">
                        <img class="img" src="Img/ImgA2.png" />   
                    </div>
               </div>
            </div>
        </section>
            <div id=containerfoto>
                <div class="foto">
                    <img class="imgf" src="Img/ImgA3.png">
                    <h2>71,5 milioni di clienti attivi</h2>
                </div>
                <div class="foto">
                    <img class="imgf" src="Img/ImgA4.png">
                    <h2>>25 paesi</h2>
                </div>
                <div class="foto">
                    <img class="imgf" src="Img/ImgA5.png">
                    <h2>121.486 dipendenti</h2>
                </div>
                <div class="foto">
                    <img class="imgf" src="Img/ImgA6.png">
                    <h2>€742,194 miliardi di asset totali</h2>
                </div>
            </div>
        <section>
        </section>
         <section>
            <div id="container3">
               <div id="flex-info">
                  <div class="finfo">
                     <h3 class="indice">Informazioni rilevanti</h3>
                     <h4>Chi siamo</h4>
                     <h4>Cybersicurezza</h4>
                  </div>
                  <div class="finfo">
                     <h3 class="indice">Potrebbe interessarti</h3>
                     <h4>BBVA Blog</h4>
                     <h4>Promozioni</h4>
                     <h4>Passaparola</h4>
                  </div>
                  <div class="finfo" id="fmod">
                     <h3 class="indice">Hai bisogno di aiuto?</h3>
                     <h4>Servizio clienti</h4>
                     <h4>Aiuto emergenza</h4>
                     <h4>Reclami e inadempimenti ABF/ACF</h4>
                     <h4>Segnala una vulnerabilità</h4>
                     <h4>Contatti Comunicazione e Media</h4>
                  </div>
                  <div class="finfo" id="fmod1">
                     <h3 class="indice">BBVA App</h3>
                     <h4>Scarica l'app per Android</h4>
                     <h4>Scarica l'app per iOS</h4>
                  </div>
               </div>
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