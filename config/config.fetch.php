<?php

// Query
$sql = "SELECT Revenue FROM f_gbi LIMIT 50";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $i = -25;
    // Fetch results
    while($row = $result->fetch_assoc()) {

        $dummy = $row['Revenue'];
        $dummy = $dummy * 0.0005;

        $pos = $dummy / 2;

        $i = $i + 1;
        echo '<a-box color="#c0ebf0" depth="0.5" height="'.$dummy.'" width="0.5" position="'.$i.' '.$pos.' -20"></a-box>';
        echo "<script>console.log(".$dummy.");</script>";
    }

} else {

    echo "0 results";

}

// Close connection
$conn->close();

?>