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
                    position="0 '.$tableTextHeight.' -8.9" 
                    geometry="primitive: plane; height: auto; width:auto;"
                    material="visible: false">
                    </a-text>';
        for ($n = 1; $n < count($tableNames[$m]); $n++){

            $tableName = $tableNames[$m][0];
            $columnName = $tableNames[$m][$n];

            $dataType = fetchDataType($tableName, $columnName, $conn);

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
                        position="1 '.$tableTextHeight.' -8.9"
                        geometry="primitive: plane; height: auto; width:auto;"
                        material="visible: false">
                        </a-text>';
            $listedItemsCounter++;
        }
        $listedItemsCounter++;
    }
?>

<a-plane 
    height="<?php echo $listedItemsCounter ?>"
    width="30" 
    rotation="0 0 0" 
    side="double" 
    color="#08141C" 
    material="opacity: 0.97; transparent: true" 
    position="14 -4 -9">
</a-plane>

<a-entity
    link="href: plot.php"
    generate-button
    text="value: GENERATE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: auto;"
    material="color: #0F3448"
    position="20 16 -8.">
</a-entity>

<a-text
    value="x-axis"
    width="10"
    position="10 12 -8.9">
</a-text>
<a-text
    x-axis-input
    value="<?php echo $xColumn; ?>"
    table-name="<?php echo $xTable; ?>"
    position="20 12 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-text
    value="y-axis"
    width="10"
    position="10 9 -8.9">
</a-text>
<a-text
    y-axis-input
    value="<?php echo $yColumn; ?>"
    table-name="<?php echo $yTable; ?>"
    position="20 9 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-text
    value="z-axis"
    width="10"
    position="10 6 -8.9">
</a-text>
<a-text
    z-axis-input
    value="<?php echo $zColumn; ?>"
    table-name="<?php echo $zTable; ?>"
    position="20 6 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-text
    value="condition column"
    width="10"
    position="10 2 -8.9">
</a-text>
<a-text
    condition
    value="<?php echo $cColumn; ?>"
    table-name="<?php echo $cTable; ?>"
    position="20 2 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-text
    value="condition value"
    width="10"
    position="10 -1 -8.9">
</a-text>
<a-text
    condition-value
    clicked="false"
    id="input"
    value="<?php echo $cValue; ?>"
    position="20 -1 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>



<a-entity
    id="keyboard"
    position="15 -2.5 -8.9"
    a-keyboard
    scale="21 21 21"
    visible="false"
    >
</a-entity>