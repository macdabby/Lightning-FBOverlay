<?php

namespace Modules\FBOverlay\Model;

use Lightning\Tools\SocialDrivers\Facebook;

class CoverImage {
    public static function getImageData($image) {
        $fb = Facebook::getInstance(true, null, true);
        if ($fb) {
            $source_image = imagecreatefromstring($fb->myImageData());
            $merged_image = imagecreatetruecolor(imagesx($source_image), imagesy($source_image));
            $cover_image = imagecreatefrompng($image);
            imagecopyresampled($merged_image, $source_image, 0, 0, 0, 0, imagesx($source_image), imagesy($source_image), imagesx($source_image), imagesy($source_image));
            imagecopyresampled($merged_image, $cover_image, 0, 0, 0, 0, imagesx($source_image), imagesy($source_image), imagesx($cover_image), imagesy($cover_image));
            return $merged_image;
        }
        return null;
    }
}
