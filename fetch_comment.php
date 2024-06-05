<?php
require_once 'auth.php';
if (!$userid = checkAuth()) exit;

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$userid = mysqli_real_escape_string($conn, $userid);


$query = "SELECT id_c, username, commento FROM commenti JOIN clienti ON commenti.id_c= clienti.id";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$commentArray = array();
while($entry = mysqli_fetch_assoc($res)) {
    $commentArray[] = array(
        'idcliente' => $entry['id_c'],
        'username' => $entry['username'],
        'commento' => $entry['commento']
    );
}
echo json_encode($commentArray);

exit;
?>
