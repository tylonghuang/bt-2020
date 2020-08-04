<?php

function fetchDataType($tableName, $columnName, $conn){
    
    $getDataTypesQuery = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tableName' AND COLUMN_NAME = '$columnName'";

    $getDataTypes = $conn->query($getDataTypesQuery);

    if ($getDataTypes->num_rows > 0) {

        while($row = $getDataTypes->fetch_assoc()) {

            $dataType = $row['DATA_TYPE'];

        }

    }

    return $dataType;

}


?>