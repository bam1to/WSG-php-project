<?php
$activeLinkId = 1;
include('header.php');
?>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Adres</th>
                    <th scope="col">Numer telefonu</th>
                    <th scope="col">Adres e-mail</th>
                    <th scope="col">Adres www</th>
                    <th scope="col">Akcja</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $restaurants = $database->getRows("restauracja_widok");
                $count = 0;
                foreach ($restaurants as $restaurant) {
                    $count++;
                    $address = $restaurant['RESTAURANT_ADRES'].' '.$restaurant['CITY_NAME'];
                ?>
                    <tr>
                        <th><?php echo $count; ?></th>
                        <td><?php echo $restaurant["RESTAURANT_NAZWA"]; ?></td>
                        <td><?php echo $restaurant["RESTAURANT_OPIS"]; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $restaurant["RESTAURANT_TELNUM"]; ?></td>
                        <td><?php echo $restaurant["RESTAURANT_EMAIL"]; ?></td>
                        <td><?php echo $restaurant["RESTAURANT_ADRES"]; ?></td>
                        <td>
                            <a href="#" class="btn btn-info">Podgłąd</a>
                            <a href="#" class="btn btn-warning">Edytuj</a>
                            <a href="#" class="btn btn-danger">Usuń</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<?php 
include('footer.php');
?>