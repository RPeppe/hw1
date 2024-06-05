<?php
    include 'auth.php';
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT * FROM clienti WHERE username = '".$username."'";
        
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        //echo $entry["password"];
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            echo $entry["password"];
            if (password_verify($_POST['password'], $entry['password'])) {

                // Imposto una sessione dell'utente
                echo $entry["password"];

                $_SESSION["session_username"] = $entry['username'];
                $_SESSION["session_id"] = $entry['id'];
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="login.css">
        <title>Servizi bancari online BBVA</title>
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
                            <h3>Accesso all'Area Clienti</h3>
                        </div>
                        <div class="opzione2">
                            <h3>Vai su BBVA.it</h3>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section id="container1">
            <div id="sicurezza">
                <img id="lucchetto" src="Img/ImgL1.png" />
                <p>Ti trovi in un ambiente sicuro di BBVA</p>
            </div>
        </section>
        <section id="container2">
            <div id="main">
                <div class="info">
                    <h2>Ciao, inserisci il nome utente e la password</h2>
                    <?php
                        if (isset($error)) {
                            echo "<p class='error'>$error</p>";
                        }
                    ?>
                    <form method="post">
                        <input class="input"  name='username' type="text" placeholder="Username">
                        <input class="input"  name='password' type="password" placeholder="Password">
                        <input id="button" type="submit" value="Accedi">
                    </form>    
                </div>  
                <div class="info2">
                    <img id="scontrino" src="Img/ImgL2.png" />
                    <h2>Le tue utenze F24 senza commissioni con BBVA</h2>
                    <p>Inserisci i dati delle tue bollette e paga automaticamente.</p>
                    <h3>Non hai un account? </h3><a href="signup.php">Registrati</a>
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
</html>