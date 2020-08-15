<?php
    if (isset($_REQUEST['xC'])){
        global $xColumn, $xTable, $yColumn, $yTable, $zColumn, $zTable;

        $xColumn = $_REQUEST['xC'];
        $xTable = $_REQUEST['xT'];

        $yColumn = $_REQUEST['yC'];
        $yTable = $_REQUEST['yT'];

        $zColumn = $_REQUEST['zC'];
        $zTable = $_REQUEST['zT'];

    }

    require_once 'includes/header.php';

    require_once 'config/config.consoleLog.php';
    require_once 'config/config.db.php';
    require_once 'config/config.fetch.php';
    require_once 'config/config.test-file.php';

?>

<a-text
    link="href: index.php"
    value="Menu"
    position="20 -2 -8.99"
    width="10"
    geometry="primitive: plane; height: 2; width:10;"
    material="color: white"
    color="black"
    z-offset="0.005"
    input-status="empty">
</a-text>

<?php
    require_once 'includes/footer.php';

?>

