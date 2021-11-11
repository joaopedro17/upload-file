<?php

require __DIR__ .'/vendor/autoload.php';

use \App\File\Upload;

if (isset($_FILES['file'])) {

    $uploads = Upload::createMultipleUpload($_FILES['file']);

    foreach ($uploads as $obUpload) {

        $success = $obUpload->upload(__DIR__ .'./files',false);
        if ($success) {
            echo 'The file <strong>'.$obUpload->getBasename().'</strong> was uploaded';
            continue;
        }
        echo 'Error';
    }
    exit;
}


include __DIR__ .'/includes/form-multi.php';
