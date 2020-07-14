<?php

    /*
     *      $tableNames is a multidimensional array
     *
     *          structure:
     *              $tableNames[table][column]
     *
     *          name of the first table:
     *              $tableNames[1][0]
     *
     *          name of the columns of the first table starting with the first:
     *              $tableNames[1][1..n]
     * 
     */

    // Query to get table names from DB
    $showTables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$dbname'";

    $getTables = $conn->query($showTables);

    if ($getTables->num_rows > 0) {

        while($row = $getTables->fetch_assoc()) {

            global $tableNames;

            // Write table names into an array for further work
            $tableNames[] = $row['TABLE_NAME'];

        }

        global $tableCount;

        // Loop through table names to get the corresponding columns
        for ($tableCount = 0; $tableCount < count($tableNames); $tableCount++) {

            $showColumns = "SHOW COLUMNS FROM $dbname.$tableNames[$tableCount]";
            $getColumns = $conn->query($showColumns);

            if ($getColumns->num_rows > 0) {

                $tempTableName = $tableNames[$tableCount];
                $tableNames[$tableCount] = array();
                $tableNames[$tableCount][0] = $tempTableName;
                $l = 1;

                while($row = $getColumns->fetch_assoc()) {

                    $tableNames[$tableCount][$l] = $row['Field'];
                    $l++;

                }
                        
            } else {

                consoleLog('0 results');
                
            }
        }

        // Log table names with all columns to console
        for ($m = 0; $m < $tableCount; $m++) {
            for ($n = 1; $n < count($tableNames[$m]); $n++){
                $dummy = $tableNames[$m][0].': '.$tableNames[$m][$n];
                consoleLog($dummy);
            }
        }

    } else {

        consoleLog('0 results');

    }

?>