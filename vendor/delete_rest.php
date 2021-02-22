<?php
require_once('../lib/database.php');
$database = new Database();

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $where['RESTAURANT_ID'] = '=' . $id;
    $whereImage['IMAGE_REST'] = '=' . $id;
    $whereComment['RATING_REST'] = '=' . $id;

    $images = $database->getRows('IMAGE');
    foreach ($images as $image) {
        if ($image['IMAGE_REST'] == $id) {
            unlink('../upload/' . $image['IMAGE_NAZWA']);
            $database->removeRows('IMAGE', $whereImage);
        }
    }
    $comments = $database->getRows('RATING');
    foreach ($comments as $comment) {
        if ($comment['RATING_REST'] == $id) {
            $reviews = $database->getRows('REVIEW');
            $reviewID = $comment['RATING_REVIEW_ID'];
            foreach($reviews as $review) {
                if($review['REVIEW_ID'] == $reviewID) {
                    $whereReview['REVIEW_ID'] = '=' . $reviewID;
                    $database->removeRows('REVIEW', $whereReview);
                }
            }
            $database->removeRows('RATING', $whereComment);
        }
    }

    $database->removeRows('RESTAURANT', $where);
    header('Location: ../index.php');
}
