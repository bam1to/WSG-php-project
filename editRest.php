<?php
include('header.php');
$activeLinkId = -1;
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] < 1) {
    echo '<h1>Błąd! Nieprawidłowy identyfikator</h1>';
    die();
}
$id = $_GET['id'];
$where['RESTAURANT_ID'] = '=' . $id;
$restaurant = $database->getRow("restauracja_widok", "*", $where);
if (empty($restaurant['RESTAURANT_ID'])) {
    echo '<h1>Błąd! Wybrana restauracja nie istnieje.</h1>';
    die();
}

$images = $database->getRows('image', "*");
// var_dump($images);
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4">
            <h3>Dodawanie nowej restauracji</h3>
            <form action="./vendor/edit_rest.php?action=editrest" method="post" enctype="multipart/form-data">
                <input type="hidden" name="rest_id" class="rest-id" value=<?php echo $id; ?>>
                <div class="form-group">
                    <label>Nazwa</label>
                    <input type="text" class="form-control" name="restaurant_nazwa" placeholder="Enter the name..." value="<?php echo $restaurant['RESTAURANT_NAZWA']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea class="form-control" name="restaurant_opis" rows="5" required><?php echo $restaurant['RESTAURANT_OPIS']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="restaurant_adres" min="1" max="6" value="1" value="<?php echo $restaurant['RESTAURANT_ADRES']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Numer telefonu</label>
                    <input type="text" class="form-control" name="restaurant_telnum" placeholder="Enter the number..." value="<?php echo $restaurant['RESTAURANT_TELNUM']; ?>" required />
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="restaurant_email" placeholder="example@example.com" value="<?php echo $restaurant['RESTAURANT_EMAIL']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Adres strony internetowej</label>
                    <input type="text" class="form-control" name="restaurant_website" placeholder="http://www.example.com/" value="<?php echo $restaurant['RESTAURANT_WEBSITE']; ?>" />
                </div>
                <div class="form-group">
                    <label>Miasto</label>
                    <select class="form-control" name="restaurant_city">
                        <?php
                        $cities = $database->getRows("city");
                        $selected = '';

                        if ($hotel['HOTEL_CITY'] == $city['CITY_ID']) {
                            $selected = ' selected';
                        }
                        foreach ($cities as $city) {
                            echo '<option value="' . $city['CITY_ID'] . '">' . $city['CITY_NAME'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="img-collection">
                </div>
                <div class="form-group">
                    <label>Zdjęcia</label>
                    <input type="file" class="form-control-file" name="image[]" multiple="multiple" />
                    <small class="form-text text-muted">Maksymalny rozmiar pliku to 3 MB. Dozwolone rozszerzenia: .jpg .jpeg</small>
                </div>
                <div class="form-group">
                    <label>Opis zdjęcia</label>
                    <input type="text" class="form-control mb-1 mt-1" name="image_opis">
                </div>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="popup">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Zdjęcie</h2>
            <span class="close">&times;</span>
        </div>
        <div class="popup-body">
            <img alt="zdjęcie" class="popup-image">
        </div>
        <div class="popup-footer">
            <input type="text" class="form-control description" name="image_opis" placeholder="Dodaj nowy opis...">
            <div class="popup-footer__buttons">
                <button class="btn btn-success button-add">Zapisz nowy podpis</button>
                <button class="btn btn-danger button-delete">Usuń zdjęcie</button>
            </div>
        </div>
    </div>
</div>
<script src="src/js/image_adder.js"></script>
<?php
include('footer.php');
?>