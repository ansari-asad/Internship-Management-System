<?php
$dr="C:/xampp/htdocs/wtproj/uploads/";
if (!is_dir($dr)){
	mkdir($dr);
}
$target_dir = $dr;
$nm=explode(' ',$cname);
$target_file = $target_dir.$usn.'_'.$nm[0].'.pdf';
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["proof"]["size"] > 500000) {
    echo "<script>alert('File is too large, should be within 500KB!');</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "pdf") {
    $uploadOk = 0;
    echo "<script>alert('Only PDF Format supported!');</script>";
}
else {
    if (move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file)) {
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        $uploadOk = 0;
    }
}
//$target_file=file_get_contents($target_file);
?>