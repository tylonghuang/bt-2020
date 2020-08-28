<?php

    global $xColumn, $xTable, $yColumn, $yTable, $zColumn, $zTable, $cColumn, $cValue;
    $xColumn = $xTable = $yColumn = $yTable = $zColumn = $zTable = $cColumn = $cValue = "";
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
    require_once 'config/config.fetchTables.php';
    require_once 'config/config.fetchDataType.php';
    require_once 'config/config.menu.php';

    require_once 'includes/footer.php';

?>