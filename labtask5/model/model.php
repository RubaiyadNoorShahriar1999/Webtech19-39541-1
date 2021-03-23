<?php 

require_once 'db_connect.php';


function showAllData($tableName){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM '.$tableName.'';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showData($tableName, $columnName){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM ".$tableName." where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$columnName]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

?>