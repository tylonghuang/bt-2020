<?php

    // Function that substitutes the script tag to log output to the console by calling consoleLog($input);
    function consoleLog($loggedInput) {

        $loggedOutput = $loggedInput;

        if (is_array($loggedOutput))
            $loggedOutput = implode(',', $loggedOutput);

        echo "<script>console.log('" . $loggedOutput . "' );</script>";

    }

?>