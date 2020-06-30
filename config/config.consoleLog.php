<?php

    /*
     *
     * 
     *  still needs to be commented
     * 
     * 
     * 
     */
    

    function consoleLog($loggedInput) {

        $loggedOutput = $loggedInput;

        if (is_array($loggedOutput))
            $loggedOutput = implode(',', $loggedOutput);

        echo "<script>console.log('" . $loggedOutput . "' );</script>";
        
    }

?>