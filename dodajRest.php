<?php
$activeLinkId = 2;
include('header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4">
            <h3>Dodawanie nowej restauracji</h3>
            <form action="./vendor/add_rest.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nazwa</label>
                    <input type="text" class="form-control" name="restaurant_nazwa" placeholder="Enter the name..." required />
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea class="form-control" name="restaurant_opis" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="restaurant_adres" required />
                </div>
                <div class="form-group">
                    <label>Numer telefonu</label>
                    <input type="text" class="form-control" name="restaurant_telnum" placeholder="Enter the number..." required />
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="restaurant_email" placeholder="example@example.com" required />
                </div>
                <div class="form-group">
                    <label>Adres strony internetowej</label>
                    <input type="text" class="form-control" name="restaurant_website" placeholder="http://www.example.com/" required />
                </div>
                <div class="form-group">
                    <label>Miasto</label>
                    <select class="form-control" name="restaurant_city">
                        <?php
                        $cities = $database->getRows("CITY");
                        foreach ($cities as $city) {
                            echo '<option value="' . $city['CITY_ID'] . '">' . $city['CITY_NAME'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Zdjęcia</label>
                    <input type="file" class="form-control-file" name="Photo[]" multiple="multiple" required />
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
<?php
include('footer.php');
?>