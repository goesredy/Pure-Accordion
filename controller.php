<?php
/**
 * Created by Pure/Web
 * www.pure-web.ru
 * © 2017
 */

namespace Concrete\Package\PureAccordion;
use Concrete\Core\Package\Package as PackageInstaller;
use Concrete\Core\Block\BlockType\BlockType;

defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends PackageInstaller {

	protected $pkgHandle = 'pure_accordion';
	protected $appVersionRequired = '8.0.0';
	protected $pkgVersion = '0.9';

    public function getPackageName() {
		return t("Pure/Accordion");
	}

	public function getPackageDescription() {
		return t("Pure/Accordion a simple accordion with a permalinks.");
	}

	public function on_start() {
        /** @var $this \Concrete\Core\Package\Package() */

        //Assets
        $al = \Concrete\Core\Asset\AssetList::getInstance();

        //CSS
        $al->register(
            'css',
            'animate',
            'assets/css/animate.css',
            array('minify' => true),
            $this
        );
    }

    public function install() {
        /** @var $pkg \Concrete\Core\Entity\Package() */
        $pkg = parent::install(); //parent is \Concrete\Core\Package\Package

        $blockType = BlockType::getByHandle($this->pkgHandle);
        if (!is_object($blockType)) {
            BlockType::installBlockType($this->pkgHandle, $pkg);
        }
	}

}