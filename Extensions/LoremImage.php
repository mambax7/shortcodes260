<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core\Text\Sanitizer\Extensions;

use Xoops\Core\Text\Sanitizer;
use Xoops\Core\Text\Sanitizer\ExtensionAbstract;

/**
 * Googlechart extension
 *
 * @category  Sanitizer\Extensions
 * @package   Xoops\Core\Text
 * @author    Michael Beck <mambax7@gmail.com> (based on code from WordPress)
 * @copyright 2015 WordPress (http://wordpress.org)
 * @copyright 2000-2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @link      http://xoops.org
 */
class Loremimage extends ExtensionAbstract
{

    protected static $jsLoaded;

    //    protected static $defaultConfiguration = ['enabled' => true];

    /**
     * @var array default configuration values
     */
    protected static $defaultConfiguration = [
        'enabled'     => true,
        'width' => 400,
        'height' => 200];

    /**
     * Register extension with the supplied sanitizer instance
     *
     * @return void
     */
    public function registerExtensionProcessing()
    {
        $config = $this->ts->getConfig('loremimage'); // direct load to allow Sanitizer to change 'allowchart'
        $this->shortcodes->addShortcode('loremimage', function ($attributes, $content, $tagName) use ($config) {
            $xoops    = \Xoops::getInstance();
            $defaults = [
                'width' => 400,
                'height' => 200];

            $cleanAttributes = $this->shortcodes->shortcodeAttributes($defaults, $attributes);
            $width    = $cleanAttributes['width'];
            $height     = $cleanAttributes['height'];

            return '<img src="http://lorempixel.com/'. $width . '/'. $height . '" />';
        });
    }
}
