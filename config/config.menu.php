<?php
    $listedItemsCounter = 1;
    $tableTextHeight = 18;
    for ($m = 0; $m < $tableCount; $m++) {
        $tableTextHeight = $tableTextHeight - 1;
        echo '  <a-text 
                    value="'.$tableNames[$m][0].'"
                    side="double"
                    width="10"
                    rotation="0 0 0"
                    position="0 '.$tableTextHeight.' -8.9" 
                    geometry="primitive: plane; height: auto; width:auto;"
                    material="visible: false"
                    font="/bt-2020/assets/consolab-msdf.json"
                    color="white"
                    negate="false">
                    </a-text>';

        $tempTableLineStart = $tableTextHeight - 0.8;
        $tempTableLineEnd = $tableTextHeight - count($tableNames[$m]) + 0.7;
        echo '  <a-entity
                    line="start: 0.5, '.$tempTableLineStart.', -8.9; end: 0.5, '.$tempTableLineEnd.', -8.9; color: #8B8B8B">
                </a-entity>';

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
                        material="visible: false"
                        font="/bt-2020/assets/consolab-msdf.json"
                        color="white"
                        negate="false">
                        </a-text>';
            $listedItemsCounter++;
        }
        $listedItemsCounter++;
    }

    $yBackgroundPos = $listedItemsCounter / 2 + $tableTextHeight - 1;
?>

<a-plane 
    height="<?php echo $listedItemsCounter ?>"
    width="32" 
    rotation="0 0 0" 
    side="double" 
    color="#08141C" 
    material="transparent: true;" 
    position="14 <?php echo $yBackgroundPos ?> -9">
</a-plane>
<a-plane 
    height="31"
    width="32" 
    rotation="0 0 0" 
    side="double" 
    color="#08141C" 
    material="transparent: true;" 
    position="14 5 -9">
</a-plane>

<a-entity
    link="href: plot.php"
    generate-button
    text="value: GENERATE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: auto;"
    material="color: #0F3448"
    position="20 -8 -8.9">
</a-entity>

<a-text
    value="TABLES"
    width="20"
    position="0 19 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>

<a-text
    value="PLOT"
    width="20"
    position="10 19 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>

<a-text
    value="ADDITIONAL CONDITION"
    width="20"
    position="10 7 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>

<a-entity
    line="start: 7, 17.2, -8.9; end: 7, <?php echo $tableTextHeight - 0.2; ?>, -8.9; color: #8B8B8B">
</a-entity>

<a-entity
    line="start: 7, 17.2, -8.9; end: 7, 0.1, -8.9; color: #8B8B8B">
</a-entity>

<a-text
    value="X-axis"
    width="13"
    position="10 16 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>
<a-text
    x-axis-input
    value="<?php echo $xColumn; ?>"
    table-name="<?php echo $xTable; ?>"
    position="20 16 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-entity
    delete="passedField: x-axis-input"
    text="value: DELETE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: 3;"
    material="color: #a12f2f"
    position="27 16 -8.9">
</a-entity>
<a-text
    value="Y-axis"
    width="13"
    position="10 13 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>
<a-text
    y-axis-input
    value="<?php echo $yColumn; ?>"
    table-name="<?php echo $yTable; ?>"
    position="20 13 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-entity
    delete="passedField: y-axis-input"
    text="value: DELETE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: 3;"
    material="color: #a12f2f"
    position="27 13 -8.9">
</a-entity>
<a-text
    value="Z-axis"
    width="13"
    position="10 10 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>
<a-text
    z-axis-input
    value="<?php echo $zColumn; ?>"
    table-name="<?php echo $zTable; ?>"
    position="20 10 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-entity
    delete="passedField: z-axis-input"
    text="value: DELETE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: 3;"
    material="color: #a12f2f"
    position="27 10 -8.9">
</a-entity>
<a-text
    value="Column"
    width="13"
    position="10 4 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>
<a-text
    condition
    value="<?php echo $cColumn; ?>"
    table-name="<?php echo $cTable; ?>"
    position="20 4 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-entity
    delete="passedField: condition"
    text="value: DELETE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: 3;"
    material="color: #a12f2f"
    position="27 4 -8.9">
</a-entity>
<a-text
    value="Value"
    width="13"
    position="10 1 -8.9"
    font="/bt-2020/assets/consolab-msdf.json"
    color="white"
    negate="false">
</a-text>
<a-text
    condition-value
    clicked="false"
    id="input"
    value="<?php echo $cValue; ?>"
    position="20 1 -8.9"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.1"
    input-status="empty">
</a-text>
<a-entity
    delete="passedField: condition-value"
    text="value: DELETE; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width: 3;"
    material="color: #a12f2f"
    position="27 1 -8.9">
</a-entity>


<a-entity
    id="keyboard"
    position="15 -1 -8.9"
    a-keyboard
    scale="21 21 21"
    visible="false"
    >
</a-entity>