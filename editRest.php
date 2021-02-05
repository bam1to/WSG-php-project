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
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4">
            <h3>Dodawanie nowej restauracji</h3>
            <form action="process.php?action=addhotel" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nazwa</label>
                    <input type="text" class="form-control" name="restaurant_nazwa" placeholder="Enter the name..." value="<?php echo $restaurant['RESTAURANT_NAZWA']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea class="form-control" name="restaurant_opis" rows="5" value="<?php echo $restaurant['RESTAURANT_OPIS']; ?>" required></textarea>
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
                    <input type="text" class="form-control" name="restaurant_website" placeholder="http://www.example.com/" value="<?php echo $restaurant['RESTAURANT_WEBSITE']; ?>" required />
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
                <div class="form-group">
                    <label>Zdjęcia</label>
                    <input type="file" class="form-control-file" name="image[]" multiple="multiple" required />
                    <small class="form-text text-muted">Maksymalny rozmiar pliku to 3 MB. Dozwolone rozszerzenia: .jpg .jpeg</small>
                </div>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </form>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>