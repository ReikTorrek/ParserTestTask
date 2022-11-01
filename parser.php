<?php
include 'helper.php';
require_once 'connection.php';

//Стандартный и вводимый пути для выгружаемого файла.
$xmlFile = @$_SERVER['argv'][1] ?: 'C:\xampp\htdocs\2022\ParserTestTask/assets/data.xml';
$offersArr = [];
$offersId = [];
$xml = simplexml_load_file($xmlFile) or die('Что - то пошло не так.');
//Парсим XML
foreach ($xml->offers->children() as $offers) {
    array_push($offersArr, helper::getAttributes($offers));
    array_push($offersId, helper::getAttributes($offers)['id']);
}
//Получаем значения из БД
$queryGet = $mysqli->query("SELECT id FROM data");
$dbArray = [];
foreach ($queryGet as $row) {
    array_push($dbArray, $row['id']);
}
//Добавляем отсутствующие значения
if ($addOffersArray = array_diff($offersId, $dbArray)) {
    $insertArr = [];
    foreach ($offersArr as $offer) {
        foreach ($addOffersArray as $id) {
            if ($offer['id'] == $id) {
                $query = $mysqli->prepare('INSERT INTO data(' . implode(', ', array_keys($offer)) .') VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $query->bind_param('isssiissssis',
                    $offer['id'], $offer['mark'], $offer['model'], $offer['generation'], $offer['year'], $offer['run'],
                    $offer['color'], $offer['bodyType'], $offer['engineType'], $offer['transmission'], $offer['gearType'], $offer['genId']
                );
                $query->execute();
            }
        }
    }
    print_r('Новое добавил');
    echo '<br><br>';
}
//Удаляем лишнее
if ($deleteOffersArray = array_diff($dbArray, $offersId)) {
    foreach ($deleteOffersArray as $id) {
        $mysqli->query("DELETE FROM data WHERE id='$id'");
    }
    print_r('Лишнее удалил');
    echo '<br><br>';
}
//Обновляем старое.
$updateOffersArray = $deleteOffersArray += $addOffersArray;
if ($updateOffersArray = array_diff($offersId, $updateOffersArray)) {
    foreach ($offersArr as $offer) {
        foreach ($updateOffersArray as $id) {
            if ($offer['id'] == $id) {
                $updateArr = $offer;
                unset($updateArr['id']);
                $query = $mysqli->prepare("UPDATE data SET " . implode('=?,', array_keys($updateArr)) . "=? WHERE id='$id'");

                $query->bind_param('sssiissssis',
                    $updateArr['mark'], $updateArr['model'], $updateArr['generation'], $updateArr['year'], $updateArr['run'],
                    $updateArr['color'], $updateArr['bodyType'], $updateArr['engineType'], $updateArr['transmission'], $updateArr['gearType'], $updateArr['genId']
                );
                $query->execute();
            }
        }
    }
    print_r('Старое обновил');
    echo '<br><br>';
}
