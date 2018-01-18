<?php

$fileNames = $_POST["filename"];
$removeSpaces = str_replace(" ", "", $fileNames);
$allFileNames = explode(",", $removeSpaces);
$countAllNames = count($allFileNames);

for ($i = 0; $i < $countAllNames; $i++) {
    if (file_exists("./path/to/your/images".$allFileNames[$i]) == false) {
        header("Location: index.php?deleteerror");
        exit();
    }
}

for ($i = 0; $i < $countAllNames; $i++) {
    $path = "./path/to/your/images".$allFileNames[$i];
    
    if (!unlink($path)) {
        header("Location: index.php?error");
        exit();
    }
}

header("Location: index.php?deletesuccess");

?>