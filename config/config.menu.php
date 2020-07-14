<?php
    
    $tableTextHeight = 20;
    for ($m = 0; $m < $tableCount; $m++) {
        $tableTextHeight = $tableTextHeight - 1;
        echo '<a-text change-color-on-hover="color: red" value="'.$tableNames[$m][0].'" side="double" width="10" rotation="0 0 0" position="0 '.$tableTextHeight.' -8.99" material="transparent: false"></a-text>';
        for ($n = 1; $n < count($tableNames[$m]); $n++){
            $dummy = $tableNames[$m][0].': '.$tableNames[$m][$n];
            consoleLog($dummy);
            $tableTextHeight = $tableTextHeight - 1;
            echo '<a-text  change-color-on-hover="color: red" value="'.$tableNames[$m][$n].'" side="double" width="10" rotation="0 0 0" position="1 '.$tableTextHeight.' -8.99" material="transparent: false"></a-text>';
        }
    }

?>

<a-plane 
    height="10" 
    width="10" 
    rotation="0 0 0" 
    side="double" 
    color="#212121" 
    material="opacity: 0.97; transparent: true" 
    position="0 0 -9">
</a-plane>