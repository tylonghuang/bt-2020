<?php

    // Normalize values to the same given maximum of all values from y-Axis
    function normalize($min, $max, $wert){
        return ($wert - $min) / $max;
    }

    global $heightNormalized;
    $heightNormalized = 15;

    global $infId;
    $infId = 0;

    for ($i = 0; $i < $quantityX; $i++) {
        for ($j = 0; $j < $quantityZ; $j++){

            // Information ID for Information Box
            $infId++;

            if ((isset($values[$i][$j][0])) && ($values[$i][$j][0] !== 0)){


                $normalizedValue = normalize($minY, $maxY, $values[$i][$j][0]) * $heightNormalized;
                //echo "<script>console.log(".$values[$i][$j][0].");</script>";

                $posY = 0;

                if ($normalizedValue !== 0) {
                    $posY = $normalizedValue / 2;
                }

                $posZ = $j - $quantityZ;

                echo    '<a-box    
                            text-field 
                            infId="'.$infId.'"
                            color="#c0ebf0" 
                            depth="0.5" 
                            height="'.$normalizedValue.'" 
                            width="0.5" 
                            position="'.$i.' '.$posY.' '.$posZ.'">
                        </a-box>';

                echo    '<a-text
                            infId="'.$infId.'"
                            align="left"
                            value="
                                '.$xColumn.': '.$xValues[$i].' \n
                                '.$zColumn.': '.$zValues[$j].' \n
                                '.$yColumn.': '.$values[$i][$j][0].'"
                            position="'.$i.' 18 '.$posZ.'"
                            width="10"
                            geometry="primitive: plane; height: 3; width: auto;"
                            material="color: white"
                            color="black"
                            z-offset="0.005"
                            visible="false">
                        </a-text>';
            } else {
                $posZ = $j - $quantityZ;
                echo    '<a-box     
                            text-field
                            infId="'.$infId.'"
                            color="red" 
                            depth="0.5" 
                            height="0.0001" 
                            width="0.5" 
                            position="'.$i.' 0 '.$posZ.'">
                        </a-box>';
                echo    '<a-text
                            infId="'.$infId.'"
                            align="left"
                            value="Not Found"
                            position="'.$i.' 18 '.$posZ.'"
                            width="10"
                            geometry="primitive: plane; height: 2; width:5;"
                            material="color: white"
                            color="black"
                            z-offset="0.005"
                            visible="false">
                        </a-text>';
            }
        }

        echo    '<a-text    
                    value="'.$xValues[$i].'" 
                    side="double" 
                    width="10" 
                    rotation="0 0 -60" 
                    position="'.$i.', -2, 0 ">
                </a-text>';
    }

    $values = "";

    for ($j = 0; $j < $quantityZ; $j++){
        echo    '<a-text    
                    value="'.$zValues[$j].'" 
                    side="double" 
                    width="10" 
                    rotation="0 -90 -60" 
                    position="-1, -2, '.($j - $quantityZ).' ">
                </a-text>';
    }

    if (isset($cColumn) && isset($cValue)) {
        $ySql .= "AND $cColumn='$cValue'";
        echo    '<a-text 
                    value="Condition: '.$cColumn.'='.$cValue.'" 
                    side="double"
                    width="10" 
                    position=" -1 -5 0">
                </a-text>';
    }

    echo    '<a-entity
                line="start: -1, -1, 0; end: '.++$quantityX.' -1, 0; color: white"
                line__2="start: -1, -1, 0; end: -1, '.++$heightNormalized.', 0; color: white"
                line__3="start: -1, -1, 0; end: -1, -1, '.(0 - $quantityZ - 1).'; color: white">
            </a-entity>';


    $xAxisCaption = $xColumn.' from: '.$xTable;
    $yAxisCaption = $yColumn.' from: '.$yTable;
    $zAxisCaption = $zColumn.' from: '.$zTable;
    echo    '<a-text 
                value="'.$xAxisCaption.'" 
                side="double" 
                width="10" 
                rotation="0 0 0" 
                position=" '.($quantityX + 0.5).', -1, 0 ">
            </a-text>';
    echo    '<a-text 
                value="'.$yAxisCaption.'" 
                side="double" 
                width="10" 
                rotation="0 0 0" 
                position=" -1, '.($heightNormalized + 1).', 0 ">
            </a-text>';
    echo    '<a-text 
                value="'.$zAxisCaption.'" 
                side="double"
                width="10" 
                rotation="0 -90 0" 
                position=" -1, -1, '.(0 - $quantityZ - 5).'">
            </a-text>';
?>