<?php

// Normalize values to the same given maximum
function normalize($min, $max, $wert){
    return ($wert - $min) / $max;
}

$i = -25;
$j = 0;
$amountValues = 50;

// Query
$sql = "SELECT Revenue FROM f_gbi LIMIT $amountValues";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // Fetch results
    while($row = $result->fetch_assoc()) {

        // Write rows from table into array
        $array[$j] = $row['Revenue'];;
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

        echo '<a-box color="#c0ebf0" depth="0.5" height="'.$normalizedValue.'" width="0.5" position="'.$i.' '.$pos.' -20"></a-box>';
        //echo '<a-sphere color=red radius="0.2" position="'.$i.' '.$normalizedValue.' -20"></a-sphere>';
    
    }


} else {

    echo "0 results";

}

// Close connection
$conn->close();

?>