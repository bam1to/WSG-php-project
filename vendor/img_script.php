<?php
require_once('../lib/database.php');
$database = new Database();

$id = $_GET['restId'];

$images = $database->getRows('image', '*');
// print_r($images);
$imageCollect = array();

foreach ($images as $image) {
    if ($image["IMAGE_REST"] == $id) {
        array_push($imageCollect, $image);
    }
}
$imageCount = count($imageCollect);
for ($i = 0; $i < $imageCount; $i++) {
    if($i !== ($imageCount - 1)) {
        echo $imageCollect[$i]["IMAGE_NAZWA"] . ' ';
    }else {
        echo $imageCollect[$i]["IMAGE_NAZWA"] . ' ' . $imageCount;
    }
}
?>