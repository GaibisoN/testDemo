<?php

function uploadFile($file, $uploadDir)
{
    $fileName = basename($file['name']);
    $targetFilePath = $uploadDir . $fileName;
    
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return $fileName;
    } else {
        return false;
    }
}
?>
