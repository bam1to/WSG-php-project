<?php
require_once('../lib/database.php');
$database = new Database();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die();
}


$id =  $_GET['id'];
$rating = (integer) $_POST['rating'];

$commentData = array(
    "REVIEW_NIK" => strip_tags($_POST["review_nik"]),
    "REVIEW_KOMENT" => strip_tags($_POST["review_koment"]),
);
$database->insertRows('REVIEW', $commentData);
$commentId = $database->getLastInsertedId();

$ratingData = array(
    "RATING_VALUE" => $rating,
    "RATING_REST" => $id,
    "RATING_REVIEW_ID" => $commentId,
);
$database->insertRows('RATING', $ratingData);
header(`Location: ../restIndex.php?id=${$id}`);
?>
