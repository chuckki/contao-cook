<?php

namespace Chuckki\ContaoCookBundle\Module;

class CookModule extends \Module
{
    protected $strTemplate = 'mod_cook';

    public function generate(): string
    {
        if (TL_MODE == 'BE') {
            $template           = new \BackendTemplate('be_wildcard');
            $template->wildcard = '### Contao Cook ###';
            $template->title    = $this->headline;
            $template->id       = $this->id;
            $template->link     = $this->name;
            $template->href     = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;

            return $template->parse();
        }

        return parent::generate();
    }

    /**
     * Generates the module.
     */
    protected function compile()
    {
        $this->Template->message = 'Hello World';
        $this->Template->action  = \Environment::get('request');
        $this->Template->formId  = 'cook';

        if (\Input::post('FORM_SUBMIT') && \Input::post('FORM_SUBMIT') == $this->Template->formId) {

            if (\Input::post('submit') == 'accept') {
                $this->setCookie('cms_cookie', 'accept', strtotime('+7 days'));
            } else {
                if (\Input::post('submit') == 'reject') {

                    $this->setCookie('cms_cookie', 'reject', strtotime('+7 days'));
                }
            }
            $this->redirect($this->Template->action);
        }

        $this->Template->cookie_accepted = false;

        if (\Input::cookie('cms_cookie') == 'accept') {
            $this->Template->cookie_accepted = true;
        }
        if (\Input::cookie('cms_cookie') == 'reject') {
            $this->Template->cookie_rejected = true;
        }
        $this->Template->content     = $this->cms_tag_text;
        $this->Template->acceptLabel = $GLOBALS['TL_LANG']['cms_tag_settings_default']['accept_label'];
        $this->Template->content     = $GLOBALS['TL_LANG']['cms_tag_settings_default']['text'];
        if ($this->cms_tag_override_label) {

            $this->Template->acceptLabel = $this->cms_tag_accept_label;
            $this->Template->content     = $this->cms_tag_text;
        }
        $this->Template->rejectLabel = $this->cms_tag_reject_label;
        $this->Template->acceptLabel = $this->replaceInsertTags($this->Template->acceptLabel);
        $this->Template->content     = $this->replaceInsertTags($this->Template->content);
        $this->Template->rejectLabel = $this->replaceInsertTags($this->Template->rejectLabel);

        $this->Template->tags  = $aTags;
        $this->Template->cmsID = uniqid('cms');
    }

}
