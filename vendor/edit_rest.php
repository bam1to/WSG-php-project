<?php
require_once('../lib/database.php');
$database = new Database();

if (!isset($_GET['action']) || empty($_GET['action'])) {
    die();
}

$action = $_GET['action'];


switch ($action) {
    case 'editrest':
        $data = array(
            "RESTAURANT_NAZWA" => strip_tags($_POST['restaurant_nazwa']),
            "RESTAURANT_OPIS" => strip_tags($_POST['restaurant_opis']),
            "RESTAURANT_ADRES" => strip_tags($_POST['restaurant_adres']),
            "RESTAURANT_CITY" => strip_tags($_POST['restaurant_city']),
            "RESTAURANT_TELNUM" => strip_tags($_POST['restaurant_telnum']),
            "RESTAURANT_EMAIL" => strip_tags($_POST['restaurant_email']),
            "RESTAURANT_WEBSITE" => strip_tags($_POST['restaurant_website'])
        );
        $id = strip_tags($_POST['rest_id']);
        $where['RESTAURANT_ID'] = '=' . $id;
        $database->updateRows('RESTAURANT', $data, $where);


        $files = $_FILES['image']; // получает сами файлы
        $imgOpis = $_POST['image_opis'];
        $fileCount = count($files['name']); //устанавливается количество файлов

        //запускается цикл проходящий по всем файлам
        for ($i = 0; $i < $fileCount; $i++) {
            if ($files['error'][$i] == 0) { //если имеет место ошибка, то всё ок
                $allowed = array('jpeg', 'jpg'); //задается массив, с позволенными типами файлов
                $filename = $files['name'][$i]; //массив с изображениями под номером i записывается в переменную, чтобы обозначить имя
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); //возвращается тип расширения файла
                if (in_array($ext, $allowed)) { //если в allowed есть ext, то...
                    if ($files['size'][$i] < 3072000) { //если размер файла меньше чем 3мб, то выполнять код
                        $curTime = time(); //текущее время
                        $newFileName = md5($curTime . $filename) . '.' . $ext; //преобразует текущее время и имя файла в хэш данные для создания уникального имени
                        $newName = '../upload/' . $newFileName; //переменная с путём к новому файлу
                        if (!file_exists($newName)) { //если фала в серверной папке не существует, то...
                            if (move_uploaded_file($files['tmp_name'][$i], $newName)) { //проверяет действительно ли файл $files['tmp_name'][$i] был загружен в $newName
                                $dataImg = array(
                                    "IMAGE_NAZWA" => $newFileName,
                                    "IMAGE_OPIS" => $imgOpis,
                                    "IMAGE_REST" => $id,
                                );
                                // print_r($dataImg);
                                $database->insertRows("IMAGE", $dataImg);
                            }
                        } 
                    } 
                }
            } 
        }
        header('Location: ../index.php');
        break;
    case 'changedescript':
        $imageName = $_GET['imageName'];

        $imagesData = $database->getRows('image', '*');
        foreach ($imagesData as $imageData) {
            if ($imageData['IMAGE_NAZWA'] == $imageName) {
                $data = array(
                    "IMAGE_NAZWA" => $imageName,
                    "IMAGE_OPIS" => $_GET['descript'],
                    "IMAGE_REST" => $imageData['IMAGE_REST'],
                );
                $where['IMAGE_ID'] = '=' . $imageData['IMAGE_ID'];

                $database->updateRows('IMAGE', $data, $where);
                echo "Zapisane!";
            }
        }
        break;

    case 'deleteimage':
        $imageName = $_GET['imageName'];

        $imagesData = $database->getRows('image', '*');
        foreach($imagesData as $imageData) {
            $where['IMAGE_ID'] = '=' . $imageData['IMAGE_ID'];
            if($imageData['IMAGE_NAZWA'] == $imageName) {
                unlink('../upload/'. $imageName);
                $database->removeRows('IMAGE', $where);
                echo 'Usunięto';
            }
        }
        break;
}
