<?php
    // Set timezone
    date_default_timezone_set('Asia/Bangkok');

    // Get payload
    $payload = $_GET['payload'];

    // Create object to store timestamp and payload as JSON
    $dataObj = new stdClass();

    // Get timestamp and payload
    $dataObj->datetime = date('m/d/Y h:i:s', time());
    $dataObj->payload = $payload;

    // Get data from .json file as JSON
    $previousData = file_get_contents('payloads.txt');

    // Get array of data
    if($previousData == "") {
        $dataArray = [];
    } else {
        $dataArray = json_decode($previousData);
    }

    // Push new data to array
    array_push($dataArray, $dataObj);

    // Encode array of data to JSON
    $jsonDataNew = json_encode($dataArray);

    // Store JSON data into .json file
    file_put_contents('payloads.txt', $jsonDataNew);
?>