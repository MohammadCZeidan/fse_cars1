<?php 
include("connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

if($id == -1){
    $sql = "SELECT * FROM cars";
    $query = $mysql->prepare($sql);
}else{
    $sql = "SELECT * FROM cars WHERE id = ?";
    $query = $mysql->prepare($sql);
    $query->bind_param("i", $id);
}

$query->execute();

$array = $query->get_result();
$response = [];
while($article = $array->fetch_assoc()){
    $response[] = $article;
}

echo json_encode($response);

?>