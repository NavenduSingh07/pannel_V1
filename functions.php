<?php

function generate_image($timg='', $tmpimg='', $sn='', $pdate='', $ptime='', $mnumber=''){

    // Check if GD extension is loaded
    if (!extension_loaded('gd')) {
        echo 'GD extension is not loaded';
        return;
    }

    // Check if imagecreatefromjpeg function exists
    if (!function_exists('imagecreatefromjpeg')) {
        echo 'imagecreatefromjpeg function is not available';
        return;
    }

    // get source image and dimensions.
    $src1 = imagecreatefromjpeg($tmpimg);
    $src2 = imagecreatefromjpeg("black-strip.jpg");
    $src_w = imagesx($src1);
    $src_h = imagesy($src1);

    // Copy and merge
    imagecopymerge($src1, $src2, 0, $src_h-50, 0, 0, $src_w, 200, 100);

    $white = imagecolorallocate($src1, 255, 255, 255);
    imagettftext($src1, 25, 0, 15, $src_h-13, $white,__DIR__.'/arial-regular.ttf', $sn);
    imagettftext($src1, 25, 0, 460, $src_h-13, $white,__DIR__.'/arial-regular.ttf', $pdate);
    imagettftext($src1, 25, 0, 660, $src_h-13, $white,__DIR__.'/arial-regular.ttf', $ptime);
    imagettftext($src1, 25, 0, 820, $src_h-13, $white,__DIR__.'/arial-regular.ttf', $mnumber);

    imagepng($src1, $timg);
    imagedestroy($src1);
    imagedestroy($src2);

}

function delete($pid='',$conn){

    $sel = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `p_image` FROM `products` WHERE `id`=".$pid));
    $del = mysqli_query($conn, "DELETE FROM `products` WHERE `id`=".$pid);
    unlink($sel['p_image']);
    if($del){
        $flags = 1;
    }else{
        $flags = 0;
    }

    return $flags;
}
?>
