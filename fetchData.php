<?php

    // Passed Values from menu for 3D graph generation
    global $xColumn, $xTable, $yColumn, $yTable, $zColumn, $zTable;

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


    require_once 'includes/header.php';

    require_once 'config/config.consoleLog.php';
    require_once 'config/config.db.php';
    require_once 'config/config.fetch.php';
    require_once 'config/config.plot.php';

?>


<!-- 
    // Button to navigate to menu
-->
<a-text
    link="href: index.php"
    value="Menu"
    position="1.25 -7 0"
    rotation="0 0 0"
    width="5"
    geometry="primitive: plane; height: 2; width:5;"
    material="color: white"
    color="black"
    z-offset="0.005"
    input-status="empty">
</a-text>

<?php
    require_once 'includes/footer.php';

?>

