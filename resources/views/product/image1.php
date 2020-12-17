<?php
$fileName = $_FILES['product-register-image-upload-1']['name'];
$ext3 = substr($fileName, -3);
$ext4 = substr($fileName, -4);
if ($ext3 != 'jpg' && $ext4 != 'jpeg' && $ext3 != 'png' && $ext3 != 'gif') {
    echo 'file';
} else if ($_FILES['product-register-image-upload-1']['size'] > 10000000) {
    echo 'size';
} else {
    $image = date('YmdHis') . $fileName;
    move_uploaded_file($_FILES['product-register-image-upload-1']['tmp_name'], '/images/' . $image);
    echo $image;
}
?>