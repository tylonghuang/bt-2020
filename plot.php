<?php

    // Passed Values from menu for 3D graph generation
    global $xColumn, $xTable, $yColumn, $yTable, $zColumn, $zTable, $cColumn, $cValue;

    if (isset($_REQUEST['xC'])){
        $xColumn = $_REQUEST['xC'];
        $xTable = $_REQUEST['xT'];
    }
        
    if (isset($_REQUEST['yC'])){
        $yColumn = $_REQUEST['yC'];
        $yTable = $_REQUEST['yT'];
    }

    if (isset($_REQUEST['zC'])){
        $zColumn = $_REQUEST['zC'];
        $zTable = $_REQUEST['zT'];
    }

    if (isset($_REQUEST['cC'])){
        $cColumn = $_REQUEST['cC'];
        $cTable = $_REQUEST['cT'];
    }

    if (isset($_REQUEST['cV'])){
        $cValue = $_REQUEST['cV'];
    }


    require_once 'includes/header.php';

    require_once 'config/config.consoleLog.php';
    require_once 'config/config.db.php';
    require_once 'config/config.fetch.php';
    require_once 'config/config.plotter.php';

?>


<!-- 
    // Button to navigate to menu
-->
<a-entity
    link="href: index.php"
    text="value: MENU; color: white; z-offset: 0.1; width: 10; align: center;"
    geometry="primitive: plane; height: 2; width:5;"
    material="color: #0F3448"
    position="1.25 -7 0">
</a-entity>

<?php
    require_once 'includes/footer.php';

?>

