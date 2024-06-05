<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CartadiDebito.css">ù
        <script src="CartadiDebito.js" defer></script>
        <title>Carta di debito gratuita | BBVA Italia</title>
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
                     <div class="opzione3">
                        <a><img id="img" src="Img/ImgLente.png" /></a>
                     </div>
                     <div class="opzione4">
                        <a>Menu<img src="Img/Img01.png" /></a>
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
                  <a href="blog.php">Blog</a>
                  <a href="home.php">Vai alla home</a>
                  <a href="profilo.php">Il mio account</a>  
                  <a href="logout.php">Logout</a>
               </div>
            </nav>
            <div id="flex-container1">
               <div class="meta">
                  <div class="info">
                     <p id="p1">Carta di debito BBVA</p>
                     <h1 id="bianco">Carta di debito senza costi</h1>
                     <h1 id="giallo">e con vantaggi esclusivi</h1>
                     <p class="lista">Fisica o digitale gratuita</p>
                     <p class="lista">4% di cashback tutti i mesi sui tuoi acquisti</p>
                     <p class="lista">Con il Pay&Plan paga a rate come vuoi tu.</p>
                     <p class="lista">Carta con massima sicurezza e controllo.</p>
                     <p id="p2">Apri il conto corrente a zero spese per sempre e riceverai gratis la tua carta.</p>
                     <div id="azioni">
                        <a id="azione1">Apri il conto</a>
                        <a id="azione2"><img src="Img/Imgocchio.png" />Scopri di più</a>
                     </div>
                  </div>
               </div>
               <div class="colonnaBlu">
                  <img class="img" src="Img/ImgC1.png">
               </div>
            </div>
         </header>
        <section>
            <div id="container1">
               <div id="flex-container2">
                  <div class="colonnaBianca1">
                     <img id="img2" src="Img/ImgC2.png" />
                  </div>
                  <div class="colonnaBianca2">
                     <h2 class="titolocontainer">Tu spendi e noi ti rimborsiamo</h2>
                     <p class="saldo">Ti rimborsiamo il 4% di cashback tutti i mesi fino al 31/01/2025.</p>
                     <p class="saldo">Ricevi l’importo mensilmente direttamente sul tuo conto.</p>
                     <p class="saldo">Valido su tutti i tuoi acquisti con la carta fisica o digitale, fino a una spesa massima di 200€ al mese.</p>
                     <a class="tconto">Apri il conto</a>
                  </div>
               </div>
            </div>
         </section>
         <section>
            <div id="container2">
               <div id="flex-container3">
                  <div class="colonnaBlu11">
                     <img id="img6" src="Img/ImgC3.png">
                  </div>
                  <div class="colonnaBlu22">
                     <h2 class="titolocontainer">Passare a BBVA è facile e veloce</h2>
                     <p id="p3">Vuoi trasferire il tuo conto e i pagamenti in BBVA?
                        Con Cambio facile tu fai la richiesta online e al resto ci pensiamo noi.</p>
                     <p class="saldo">100% online e senza costi.</p>
                     <p class="saldo">Senza burocrazia.</p>
                     <p class="saldo">Semplice e comodo.</p>
                     <a class="link"><img class="occhio" src="Img/Imgocchio.png" />Scopri Cambio facile a BBVA</a>
                  </div>
               </div>
            </div>
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