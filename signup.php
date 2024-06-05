<?php
    require_once 'auth.php';

    if (checkAuth()) {
        header("Location: home.php");
        exit;
    }   

    if (!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["telefono"]) && !empty($_POST["username"]) && 
        !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["accetta"]))
    {
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM clienti WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }

        if (!preg_match('/^[0-9]+$/', $_POST['telefono'])) {
            $error[] = "Il numero di telefono deve contenere solo cifre";
        }

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }
        
        if (strcmp($_POST["password"], $_POST["ripeti_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM clienti WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }

        if (count($error) == 0) {
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO clienti(nome,cognome, telefono, username, email, password) VALUES('$nome','$cognome', '$telefono', '$username', '$email', '$password')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["session_username"] = $_POST["username"];
                $_SESSION["session_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: login.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="signup.css">
        <script src="signup.js" defer></script>
        <title>Diventa cliente BBVA</title>
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
                            <h3>Diventa cliente</h3>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section id="container">
            <div id="main">
                <div class="info">
                    <h2>Informazioni personali</h2>
                    <p>Inserisci i dati richiesti: ci serviranno per aprire il tuo conto.</p>
                    <h3>DATI PERSONALI</h3>
                    <form method='post' enctype="multipart/form-data" autocomplete="off">
                        <input class="input" name='nome' type="text" placeholder="Nome" <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?>>
                        <input class="input" name='cognome' type="text" placeholder="Cognome" <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?>>
                        <input class="input" name='telefono' type="text" placeholder="Numero di telefono" <?php if(isset($_POST["telefono"])){echo "value=".$_POST["telefono"];} ?>>
                        <input class="input" name='username' type="text" placeholder="Username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                        <input class="input" name='email' type="text" placeholder="E-mail" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                        <input class="input" name='password' type="password" placeholder="Password">
                        <input class="input" name='ripeti_password' type="password" placeholder="Ripeti la password">
                        <div id="check">
                            <input name="accetta" type="checkbox">Ho letto, compreso e accetto l'informativa sul trattamento dei dati personali.
                        </div>
                        <input id="button" type="submit" value="Registrati">
                    </form> 
                </div>  
                <div class="info2">
                    <img src="Img/ImgS1.png" />
                    <h3>Ti trovi in un ambiente protetto, i tuoi dati sono al sicuro.</h3>
                    <h3 id="testo">Sei già registrato? <a href="login.php">Accedi</a></h3>
                    <div>
                        <?php if(isset($error)) {
                        foreach($error as $err) {
                            echo "<div class='errorj'><span><h3>ERRORE FORM:</h3>".$err."</span></div>";
                        }
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>