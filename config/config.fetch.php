<?php

    /*
     *      $values is a multidimensional array
     *
     *          structure:
     *              $values[x-Axis][z-Axis][y-axis]
     * 
     */

    global $maxY;
    global $minY;
    global $quantityX;
    global $quantityZ;
    $maxY = 0;
    $minY = 0;
    $i = 0;
    $j = 0;
    $k = 0;
    $summedValueY = 0;
    $limit = 1000;

    // Query for x-Axis
    $sqlX = "SELECT DISTINCT $xColumn FROM $xTable ORDER BY $xColumn";
    $result = $conn->query($sqlX);

    if ($result->num_rows > 0) {

        // Fetch results for x-Axis
        while($row = $result->fetch_assoc()) {

            global $values;
            global $xValues;

            // Write values from x-Axis into large array
            $values[] = $row[$xColumn];
            $xValues[] = $row[$xColumn];
            $i++;

        }

        $quantityX = $i;

        // For-Loop to go through z-axis
        for ($i = 0; $i < $quantityX; $i++){

            $conditionX = $values[$i]; 

            // Query for z-Axis
            $zSql = "SELECT DISTINCT $zColumn FROM $zTable WHERE $xColumn='$conditionX' ORDER BY $zColumn DESC";
            $result = $conn->query($zSql);
            $j = 0;

            if ($result->num_rows > 0) {

                $values[$i] = array();

                while($row = $result->fetch_assoc()) {

                    global $zValues;

                    // Write values from z-Axis into large array
                    $values[$i][] = $row[$zColumn];
                    $zValues[] = $row[$zColumn];
                    $j++;

                }

                $quantityZ = $j;

                // For-Loop to go through y-axis
                for ($j = 0; $j < $quantityZ; $j++){

                    $conditionZ = $values[$i][$j];
                    $summedValueY = 0;
                    // Query for y-Axis
                    $ySql = "SELECT $yColumn FROM $yTable WHERE $xColumn='$conditionX' AND $zColumn='$conditionZ' ";

                    if (isset($cColumn) && isset($cValue)) {
                        $ySql .= "AND $cColumn='$cValue'";
                    }

                    $result = $conn->query($ySql);

                    if ($result->num_rows > 0) {

                        $values[$i][$j] = array();

                        while($row = $result->fetch_assoc()) {

                            // Sum values from y-Axis                            
                            $summedValueY = $summedValueY + str_replace(',', '.', $row[$yColumn]);

                        }

                    }

                    // Write summed value from y-Axis into large array
                    $values[$i][$j][0] = $summedValueY;
                    $test = $values[$i][$j][0];

                    if (is_array($values[$i][$j])) {
                        if ($maxY < max($values[$i][$j])){
                            $maxY = max($values[$i][$j]);
                        }
                    }

                }

            }

        }

    }
?>