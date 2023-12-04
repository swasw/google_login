<?php
    $myObj["what"] = "John";
    $myObj[2] = 30;
    $myObj[3] = "New York";

    $myJSON = json_encode($myObj);

    echo $myJSON;
    // if (isset($_POST['test'])) {
    //     echo "what";
    // }
        
?>