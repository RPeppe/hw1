<?php
require_once 'auth.php';
if (!$userid = checkAuth()) exit;

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$userid = mysqli_real_escape_string($conn, $userid);


$query = "SELECT id, commento FROM commenti WHERE id_c = $userid ORDER BY id DESC";
//$query = "SELECT id FROM commenti";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$commentpArray = array();
while($entry = mysqli_fetch_assoc($res)) {
    $commentpArray[] = array(
        'idcommento' => $entry['id'],
        'commento' => $entry['commento']
    );
}
echo json_encode($commentpArray);

exit;
?>
