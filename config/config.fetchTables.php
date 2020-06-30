<?php

    /*
     *
     * 
     *  still needs to be commented
     * 
     * 
     * 
     */
    
    $showTables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = 'gbi'";

    $getTables = $conn->query($showTables);

    
    
    if ($getTables->num_rows > 0) {

        while($row = $getTables->fetch_assoc()) {

            // Write rows from table into array
            //consoleLog($row['TABLE_NAME']);

            $tableNames[] = $row['TABLE_NAME'];

        }

        for ($k = 0; $k < count($tableNames); $k++) {

            $showColumns = "SHOW COLUMNS FROM gbi.$tableNames[$k]"; 
            $getColumns = $conn->query($showColumns);
            if ($getColumns->num_rows > 0) {
                while($row = $getColumns->fetch_assoc()) {
                    // Write rows from table into array
                    //consoleLog($row['Field']);
                    $columnNames[] = $row['Field'];
                }
                
        
            } else {
                consoleLog('0 results');
            }
        }

        consoleLog($k);

        consoleLog($tableNames);
        consoleLog($columnNames);

    } else {

        consoleLog('0 results');
    
    }
    
    
?>