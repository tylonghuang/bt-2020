<?php

    // Normalize values to the same given maximum
    function normalize($min, $max, $wert){
        return ($wert - $min) / $max;
    }

    $i = -25;
    $j = 0;
    $amountValues = 100;

    // Query
    $sql = "SELECT $yColumn FROM $yTable LIMIT $amountValues";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Fetch results
        while($row = $result->fetch_assoc()) {

            // Write rows from table into array
            $array[$j] = $row[$yColumn];
            $j++;

        }

        // Get maximum value in fetched rows
        $maxValue = max($array);

        // Set minimum value to 0 for normalization
        $minValue = 0;

        // Loop over normalized values and display them
        for ($k = 0; $k < $amountValues; $k++) {

            // Call normalize function that can be adjusted by changing the factor
            $normalizedValue = normalize($minValue, $maxValue, $array[$k]) * 15;

            echo "<script>console.log(".$normalizedValue.");</script>";

            // Center elements vertically
            $pos = $normalizedValue / 2;
            $i++;

            echo '<a-box change-color-on-hover="color: #22c9b3" color="#c0ebf0" depth="0.5" height="'.$normalizedValue.'" width="0.5" position="'.$i.' '.$pos.' -20"></a-box>';
            echo '<a-text value="'.$array[$k].'" side="double" width="10" rotation="0 0 -60" position="'.$i.', -2, -19.75"></a-text>';
            //echo '<a-sphere color=red radius="0.2" position="'.$i.' '.$normalizedValue.' -20"></a-sphere>';
        
        }

        echo '<a-entity
                line="start: -25, -1, -19.75; end: '.++$i.' -1 -19.75; color: white"
                line__2="start: -25, -1, -19.75; end: -25, 16, -19.75; color: white"
                line__3="start: -25, -1, -19.75; end: -25, -1, -30; color: white"
            ></a-entity>
            <a-text value="'.$yColumn.'" side="double" width="30" rotation="0 0 0" position=" 0, 18, -19.75"></a-text>
            <a-text value="x-axis" side="double" width="20" rotation="0 0 0" position=" '.($i + 1).', -1, -19.75"></a-text>'
        ;


    } else {

        echo "0 results";

    }

?>