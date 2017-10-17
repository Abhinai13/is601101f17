<?php

if (($_FILES['CSVfile']['name']!="")){
// Where the file is going to be stored
	$target_dir = "uploads/";
	$file = $_FILES['CSVfile']['name'];
	echo "filename: " .$file;
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['CSVfile']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 echo "Sorry, file already exists.";
 } else {
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
 }
}
header('Location: displaycsv.php?filename='.$path_filename_ext); exit;

//header('Location: displaycsv.php'); exit;

//header('Location: /displaycsv.php', true, $code) to forward user to another page:

?>