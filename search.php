<?php
require_once('./lib/database.php');
$database = new Database();
include('header.php');


if (isset($_POST['submit']) && isset($_GET['go']) && preg_match("/[A-Za-z0-9]+/", $_POST['query'])) {
    $resValues = array();
    $name = $_POST['query'];
    $results = $database->getRows('restauracja_widok');
    // $sql = "SELECT RESTAURANT_ID, RESTAURANT_NAZWA FROM restauracja_widok";
    // $result = mysqli_query( $database , $sql);
    $resCount = count($results);
    for ($i = 0; $i < $resCount; $i++) {
        if (strpos($results[$i]['RESTAURANT_NAZWA'], $name) !== false) {
            array_push($resValues, $results[$i]);
        }else {
            // echo '<p class="error">Nie znaleziono strony!</p>';
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
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
                        foreach ($resValues as $resValue) {
                            $count = 0;
                            $count++;
                            $address = $resValue['RESTAURANT_ADRES'] . ' ' . $resValue['CITY_NAME'];
                        ?>
                            <tr>
                                <th><?php echo $count; ?></th>
                                <td><?php echo $resValue["RESTAURANT_NAZWA"]; ?></td>
                                <td class="table-row"><span><?php echo $resValue["RESTAURANT_OPIS"]; ?></span></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $resValue["RESTAURANT_TELNUM"]; ?></td>
                                <td><?php echo $resValue["RESTAURANT_EMAIL"]; ?></td>
                                <td><?php echo $resValue["RESTAURANT_WEBSITE"]; ?></td>
                                <td>
                                    <a href="restIndex.php?id=<?php echo $resValue["RESTAURANT_ID"] ?>" class="btn btn-info">Podgłąd</a>
                                    <a href="editRest.php?id=<?php echo $resValue["RESTAURANT_ID"] ?>" class="btn btn-warning">Edytuj</a>
                                    <a href="vendor/delete_rest.php?id=<?php echo $resValue["RESTAURANT_ID"] ?>" class="btn btn-danger">Usuń</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- /.container -->
<?php
} else {
    echo 'It was empty query';
}
