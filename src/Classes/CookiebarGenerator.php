<?php

/*
 * cook extension for Contao Open Source CMS
 *
 * Copyright (C) 2011-2018 Codefog
 *
 * @author  Codefog <https://codefog.pl>
 * @author  Kamil Kuzminski <https://github.com/qzminski>
 * @license MIT
 */

namespace Chuckki\ContaoCookBundle\Classes;

use Contao\Frontend;
use Contao\FrontendTemplate;

class CookiebarGenerator extends Frontend
{
    /**
     * Create the cookie bar template.
     *
     * @param array  $data
     * @param string $name
     *
     * @return FrontendTemplate
     */
    public function createTemplate(array $data, $name = 'cook')
    {
        $template = new FrontendTemplate($name);
        $this->setBasicData($template, $data);
        $this->setMoreLinkData($template, $data);
        $this->setAnalyticsCheckboxData($template, $data);

        // Cookie name
        $template->cookie = sprintf('cook_%s', $data['id']);

        return $template;
    }

    /**
     * Automatically set all variables with cook_ prefix.
     *
     * @param FrontendTemplate $template
     * @param array            $data
     */
    private function setBasicData(FrontendTemplate $template, array $data)
    {
        foreach ($data as $k => $v) {
            if (0 === strpos($k, 'cook_')) {
                $template->{substr($k, 5)} = $v;
            }
        }

        $template->raw = $data;
    }

    /**
     * Set the "more" link data.
     *
     * @param FrontendTemplate $template
     * @param array            $data
     */
    private function setMoreLinkData(FrontendTemplate $template, array $data)
    {
        $template->more = null;

        if ($data['cook_url']) {
            $template->more = [
                'label' => $data['cook_link'] ?: $GLOBALS['TL_LANG']['MSC']['cook.more'],
                'url' => $data['cook_url'],
            ];
        }
    }

    /**
     * Set the "analytics" checkbox data.
     *
     * @param FrontendTemplate $template
     * @param array            $data
     */
    private function setAnalyticsCheckboxData(FrontendTemplate $template, array $data)
    {
        $template->analyticsCheckbox = null;

        if ($data['cook_analyticsCheckbox']) {
            $template->analyticsCheckbox = [
                'label' => $data['cook_analyticsLabel'] ?: $GLOBALS['TL_LANG']['MSC']['cook.analytics'],
            ];
        }
    }
}
