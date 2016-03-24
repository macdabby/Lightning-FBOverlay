<?php

namespace Modules\FBOverlay\Pages;

use Lightning\Tools\Configuration;
use Lightning\Tools\Output;
use Lightning\Tools\Request;
use Lightning\View\Page;
use Modules\FBOverlay\Model\CoverImage;

class Preview extends Page {
    public function hasAccess() {
        return true;
    }

    public function get() {
        Output::setContentType('image/png');
        $id = Request::get('id', 'int');
        $images = Configuration::get('modules.FBOverlay.overlays');
        $image = HOME_PATH . $images[$id];
        echo imagepng(CoverImage::getImageData($image));
        exit;
    }
}
