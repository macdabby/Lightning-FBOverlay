<?php

namespace Modules\FBOverlay\Pages;

use Lightning\Tools\Template;
use Lightning\View\Page;
use Lightning\Tools\Request;

class Complete extends Page {

    protected $page = ['complete', 'FBOverlay'];

    public function hasAccess() {
        return true;
    }

    public function get() {
        Template::getInstance()->set('id', Request::get('id', 'int'));
    }
}
