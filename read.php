<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/employees.php';

$ch = curl_init();

$start_time=isset($_GET['starttime']) ? $_GET['starttime'] : die();
$end_time=isset($_GET['endtime']) ? $_GET['endtime'] : die();
$min_magnitude=isset($_GET['minmagnitude']) ? $_GET['minmagnitude'] : die();
curl_setopt($ch, CURLOPT_URL, 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime='.$start_time.'&endtime='.$end_time.'&minmagnitude='.$min_magnitude.'');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, POST DATA);
$result = curl_exec($ch);



print_r($result);
curl_close($ch);
/*
    $database = new Database();
    $db = $database->getConnection();

    $items = new Employee($db);

    $stmt = $items->getEmployees();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "age" => $age,
                "designation" => $designation,
                "created" => $created
            );

            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }


    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }*/
?>