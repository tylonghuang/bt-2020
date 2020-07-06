<?php

    // Query to get table names from DB
    $showTables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$dbname'";

    $getTables = $conn->query($showTables);

    if ($getTables->num_rows > 0) {

        while($row = $getTables->fetch_assoc()) {

            // Write table names into an array for further work
            $tableNames[] = $row['TABLE_NAME'];

        }

        // Loop through table names to get the corresponding columns
        for ($k = 0; $k < count($tableNames); $k++) {

            $showColumns = "SHOW COLUMNS FROM $dbname.$tableNames[$k]";
            $getColumns = $conn->query($showColumns);

            if ($getColumns->num_rows > 0) {

                $tempTableName = $tableNames[$k];
                $tableNames[$k] = array();
                $tableNames[$k][0] = $tempTableName;
                $l = 1;

                while($row = $getColumns->fetch_assoc()) {

                    $tableNames[$k][$l] = $row['Field'];
                    $l++;

                }
                        
            } else {

                consoleLog('0 results');
                
            }
        }

        // Log table names with all columns to console
        for ($m = 0; $m < $k; $m++) {
            for ($n = 1; $n < count($tableNames[$m]); $n++){
                $dummy = $tableNames[$m][0].': '.$tableNames[$m][$n];
                consoleLog($dummy);
            }
        }

    } else {

        consoleLog('0 results');

    }

?>