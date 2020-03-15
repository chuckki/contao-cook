<?php

/*
 * Cookiebar extension for Contao Open Source CMS
 *
 * Copyright (C) 2011-2018 Codefog
 *
 * @author  Codefog <https://codefog.pl>
 * @author  Kamil Kuzminski <https://github.com/qzminski>
 * @license MIT
 */

namespace Chuckki\ContaoCookBundle\Classes;

use Contao\PageModel;

class TemplateListener
{
    public function onOutputFrontendTemplate(string $buffer): string
    {
        if (null !== ($rootPage = PageModel::findByPk($GLOBALS['objPage']->rootId)) && $rootPage->cook_enable) {
            $generator = new CookiebarGenerator();
            $cookiebar = $generator->createTemplate($rootPage->row())->parse();
            if ('before_wrapper' === $rootPage->cook_placement) {
                $buffer = str_replace('<div id="wrapper">', $cookiebar.'<div id="wrapper">', $buffer);
            } else {
                $buffer = str_replace('</body>', $cookiebar.'</body>', $buffer);
            }
        }

        return $buffer;
    }
}
