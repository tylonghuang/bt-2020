<?php
    $listedItemsCounter = 1;
    $tableTextHeight = 20;
    for ($m = 0; $m < $tableCount; $m++) {
        $tableTextHeight = $tableTextHeight - 1;
        echo '  <a-text 
                    value="'.$tableNames[$m][0].'" 
                    side="double" 
                    width="10" 
                    rotation="0 0 0" 
                    position="0 '.$tableTextHeight.' -8.99" 
                    geometry="primitive: plane; height: auto; width:auto;" 
                    material="visible: false">
                    </a-text>';
        for ($n = 1; $n < count($tableNames[$m]); $n++){

            $tableName = $tableNames[$m][0];
            $columnName = $tableNames[$m][$n];

            $dataType = fetchDataType($tableName, $columnName, $conn);

            $dummy = $tableNames[$m][0].': '.$tableNames[$m][$n].': '.$dataType;
            consoleLog($dummy);
            $tableTextHeight = $tableTextHeight - 1;
            echo '  <a-text 
                        id="1"
                        data-type="'.$dataType.'" 
                        table-name="'.$tableNames[$m][0].'" 
                        change-color-on-hover="color: red" 
                        value="'.$tableNames[$m][$n].'" 
                        side="double" 
                        width="10" 
                        rotation="0 0 0" 
                        position="1 '.$tableTextHeight.' -8.99" 
                        geometry="primitive: plane; height: auto; width:auto;" 
                        material="visible: false">
                        </a-text>';
            $listedItemsCounter++;
        }
        $listedItemsCounter++;
    }
    consoleLog($listedItemsCounter);

?>

<a-plane 
    height="<?php echo $listedItemsCounter ?>"
    width="30" 
    rotation="0 0 0" 
    side="double" 
    color="#212121" 
    material="opacity: 0.97; transparent: true" 
    position="14 -4 -9">
</a-plane>

<a-text
    value="x-axis"
    width="10"
    position="12 10 -8.99">
</a-text>
<a-text
    x-axis-input
    value=""
    table-name=""
    position="20 10 -8.99"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.005"
    input-status="empty">
</a-text>
<a-text
    value="y-axis"
    width="10"
    position="12 7 -8.99">
</a-text>
<a-text
    y-axis-input
    value=""
    table-name=""
    position="20 7 -8.99"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.005"
    input-status="empty">
</a-text>
<a-text
    value="z-axis"
    width="10"
    position="12 4 -8.99">
</a-text>
<a-text
    z-axis-input
    value=""
    table-name=""
    position="20 4 -8.99"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.005"
    input-status="empty">
</a-text>
