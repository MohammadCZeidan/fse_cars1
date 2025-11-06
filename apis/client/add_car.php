<?php 
include("../../database/connection.php");

if(isset($_POST["name"]) && $_POST["name"] != ""){
    $name = $_POST["name"];
}else{
    $response = [];
    $response["success"] = false;
    $response["error"] = "Name field is missing";
    echo json_encode($response);
    return;
}

if(isset($_POST["model"])){
    $model = $_POST["model"];
}else{
    $response = [];
    $response["success"] = false;
    $response["error"] = "Model field is missing";
    echo json_encode($response);
    return;
}

if(isset($_POST["year"])){
    $year = $_POST["year"];
}else{
    $response = [];
    $response["success"] = false;
    $response["error"] = "Year field is missing";
    echo json_encode($response);
    return;
}

if(isset($_POST["color"])){
    $color = $_POST["color"];
}else{
    $response = [];
    $response["success"] = false;
    $response["error"] = "Color field is missing";
    echo json_encode($response);
    return;
}

$query = $mysql->prepare("INSERT INTO cars(name, model, year, color) VALUES (?,?,?,?)");
$query->bind_param("ssis", $name, $model, $year, $color);
$query->execute();

$response = [];
$response["success"] = true;
echo json_encode($response);

?>