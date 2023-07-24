<?php

require_once("../processing-csv/process-controller.php"); //main include

const KB = 1024;
const MB = 1048576;
const GB = 1073741824;
const TB = 1099511627776;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $duplicateVariable = 1;
    if (isset($_POST['duplicate'])) {
        $duplicateVariable = $_POST['duplicate'];
    }

    if(isset($_POST['notURL'])&&$_POST['notURL']==1){
        $file_parts = pathinfo($_FILES['file']['name']);
        if(($file_parts['extension']=="csv"||$file_parts['extension']=="CSV")&&$_FILES['file']['size'] < 100*MB){
            //Get the name of the uploaded file
            $filename = $_FILES['file']['name'];

            //Choose where to save the uploaded file
            $location = "../uploaded-csv-files/" . $filename;

            //Save the uploaded file to the local filesystem
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                echo importCsvIntoDatabase(file_get_contents("../uploaded-csv-files/" . $filename), $duplicateVariable);
            } else {
                echo 'Failure';
            }
        }
        else{
            echo "Failure";
        }
    }
    else if(isset($_POST['urlVar'])) {
        if (file_put_contents("../uploaded-csv-files/" . substr($_POST['urlVar'], strrpos($_POST['urlVar'], "/"))
                , fopen($_POST['urlVar'], 'r')) !== false) {
            echo 'Success';
            importCsvIntoDatabase(file_get_contents("../uploaded-csv-files/" . substr($_POST['urlVar'], strrpos($_POST['urlVar'], "/"))), $duplicateVariable);
        } else {
            echo 'Failure';
        }
    }
}
