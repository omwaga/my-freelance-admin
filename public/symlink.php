<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/public';
echo $targetFolder;
echo '<br>';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
echo $linkFolder;
symlink($targetFolder, $linkFolder);
echo 'Symlink process successfully completed';
