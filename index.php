<?php

require __DIR__ .'/vendor/autoload.php';

use \App\File\Upload;

if (isset($_FILES['file'])) {

    $obUpload = new Upload($_FILES['file']);

    
    $success = $obUpload->upload(__DIR__ .'./files',false);
    if ($success) {
        echo 'The file <strong>'.$obUpload->getBasename().'</strong> was uploaded';
        exit;
    }
    die('Error');
    // ($success) ? (print_r('File uploaded')) : (die('error'));

    
}


include __DIR__ .'/includes/form.php';

// echo "<pre>";
    // print_r($obUpload);
    // echo "</pre>"; exit;