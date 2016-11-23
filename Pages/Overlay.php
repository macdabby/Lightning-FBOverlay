<?php

namespace Modules\FBOverlay\Pages;

use Lightning\Tools\ClientUser;
use Lightning\Tools\Configuration;
use Lightning\Tools\Form;
use Lightning\Tools\Navigation;
use Lightning\Tools\Request;
use Lightning\Tools\SocialDrivers\Facebook;
use Lightning\Tools\Template;
use Lightning\View\JS;
use Lightning\View\Page;
use Modules\FBOverlay\Model\CoverImage;

class Overlay extends Page {

    protected $rightColumn = false;

    public function get() {
        // Load a list of images to show.
        Form::requiresToken();
        Template::getInstance()->set('overlays', Configuration::get('modules.FBOverlay.overlays'));

        $user = ClientUser::getInstance();
        if (!$user->isAnonymous()) {
            $fb = Facebook::getInstance(true, null, true);
            // TODO: Should this be moved to the user object?
            if (!$fb || !$fb->isLoggedIn()) {
                $user->logOut();
                Navigation::redirect('/overlay');
            }
            $this->page = ['preview', 'FBOverlay'];
        } else {
            JS::set('social.login_redirect', '/overlay');
            $this->page = ['fblogin', 'FBOverlay'];
        }
    }

    public function hasAccess() {
        return true;
    }

    public function postUpdate() {
        // Update the user icon
        $id = Request::post('id', 'int');
        $images = Configuration::get('modules.FBOverlay.overlays');
        $image = HOME_PATH . $images[$id];

        $image = CoverImage::getImageData($image);
        $fb = Facebook::getInstance(true, null, true);
        $tmp = tempnam('/tmp', 'cover_photo_tmp');
        imagepng($image, $tmp);
        $response = $fb->postImage($tmp);
        Navigation::redirect('/overlay/complete', ['id' => $response['id']]);
    }
}
