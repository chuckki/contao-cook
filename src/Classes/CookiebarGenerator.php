<?php

namespace Chuckki\ContaoCookBundle\Classes;

use Contao\Frontend;
use Contao\FrontendTemplate;

class CookiebarGenerator extends Frontend
{
    public function createTemplate(array $data, string $name = 'cook'): FrontendTemplate
    {
        $template = new FrontendTemplate($name);
        $this->setBasicData($template, $data);
        $this->setMoreLinkData($template, $data);
        $this->setAnalyticsCheckboxData($template, $data);

        // Cookie name
        $template->cookie = sprintf('cook_%s', $data['id']);

        return $template;
    }

    private function setBasicData(FrontendTemplate $template, array $data): void
    {
        foreach ($data as $k => $v) {
            if (str_starts_with($k, 'cook_')) {
                $template->{substr($k, 5)} = $v;
            }
        }

        $template->raw = $data;
    }

    private function setMoreLinkData(FrontendTemplate $template, array $data): void
    {
        $template->more = null;

        if ($data['cook_url']) {
            $template->more = [
                'label' => $data['cook_link'] ?: $GLOBALS['TL_LANG']['MSC']['cook.more'],
                'url' => $data['cook_url'],
            ];
        }
    }

    private function setAnalyticsCheckboxData(FrontendTemplate $template, array $data): void
    {
        $template->analyticsCheckbox = null;

        if ($data['cook_analyticsCheckbox']) {
            $template->analyticsCheckbox = [
                'label' => $data['cook_analyticsLabel'] ?: $GLOBALS['TL_LANG']['MSC']['cook.analytics'],
            ];
        }
    }
}
