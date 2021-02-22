<?php
require_once('lib/database.php');
$database = new Database();

$restDatas = $database->getRows('restauracja_widok');
$imageDatas = $database->getRows('IMAGE', '*');
$restId = $_GET['id'];

$imagesAssort = array();

foreach ($restDatas as $restData) {
    if ($restData['RESTAURANT_ID'] == $restId) {
        $restName = $restData['RESTAURANT_NAZWA'];
        $restOpis = $restData['RESTAURANT_OPIS'];
        $restTel = $restData['RESTAURANT_TELNUM'];
        $restAddress = $restData['RESTAURANT_ADRES'] . ' ' . $restData['CITY_NAME'];
        $restEmail = $restData['RESTAURANT_EMAIL'];
        $restWebsite = $restData['RESTAURANT_WEBSITE'];
    }
}

foreach ($imageDatas as $imageData) {
    if ($imageData['IMAGE_REST'] == $restId) {
        array_push($imagesAssort, $imageData);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja: '<?php echo $restName ?>'</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/10970325af.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Restauracji</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Lista restauracji</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dodajRest.php">
                                Dodaj restaurację
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item c-head active">
                        <h1 class="c-heading">Zapraszamy do "<?php echo $restName ?>"</h1>
                    </div>
                    <?php
                    $imageCount = count($imagesAssort);
                    for ($i = 0; $i < $imageCount; $i++) {
                        $imageName = $imagesAssort[$i]['IMAGE_NAZWA'];
                        $imageOpis = $imagesAssort[$i]['IMAGE_OPIS'];
                    ?>
                        <div class="carousel-item ">
                            <img src="upload/<?php echo $imageName ?>" class="d-block c-img" alt="<?php echo $imageOpis ?>">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $imageOpis ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container content">
            <div class="opis">
                <h3 class="opis_heading">Opis restauracji</h3>
                <p>
                    <?php echo $restOpis ?>
                </p>
            </div>
            <div class="contacts">
                <h3 class="contacts_heading">Kontakty</h3>
                <span class="address"><?php echo $restAddress ?></span>
                <a href="tel:<?php echo $restTel ?>" class="telnum"><?php echo $restTel ?></a>
                <a href="mailto:<?php echo $restEmail ?> "><?php echo $restEmail ?></a>
                <a href="<?php echo $restWebsite ?>"><?php echo $restWebsite ?></a>
            </div>
        </div>
        <div class="opinion">
            <form action="./vendor/add_opinion.php?id=<?php echo $restId ?>" method="post">
                <h3>Zostaw nam swoje opinię</h3>
                <div class="form-group mb-2">
                    <label for="">Nikname</label>
                    <input type="text" class="form-control" name="review_nik">
                </div>
                <small>Oceń</small>
                <div class="rating mb-2">
                    <div class="rating__body">
                        <div class="rating__active"></div>
                        <div class="rating__items">
                            <input type="radio" class="rating__item" value="1" name="rating">
                            <input type="radio" class="rating__item" value="2" name="rating">
                            <input type="radio" class="rating__item" value="3" checked name="rating">
                            <input type="radio" class="rating__item" value="4" name="rating">
                            <input type="radio" class="rating__item" value="5" name="rating">

                        </div>
                    </div>
                    <div class="rating__value">
                        3
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="komentarz">Komentarz</label>
                    <textarea name="review_koment" class="form-control" id="komentarz" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </form>
        </div>
        <div class="comments-container container-fluid mt-2">
            <div class="comments d-flex flex-column justify-content-center align-items-center">
                <?php
                $comment = $database->getRows('comment_widok');
                $commentCount = count($comment);
                for ($i = 0; $i < $commentCount; $i++) {
                    if ($comment[$i]['RATING_REST'] === $restId) {
                ?>
                        <div class="comments__comment">
                            <small class="username"><?php echo $comment[$i]["REVIEW_NIK"] ?></small>
                            <span>Rating: <span class="self_rating"><?php echo $comment[$i]["RATING_VALUE"] ?></span></span>
                            <p class="comment-body"><?php echo $comment[$i]["REVIEW_KOMENT"] ?></p>
                        </div>
                        <hr>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <script src="./src/js/rating_script.js"></script>
    <?php
    include('footer.php');
    ?>