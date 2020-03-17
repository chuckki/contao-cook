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

/**
 * Extend the palettes.
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'cook_enable';
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'cook_analyticsCheckbox';
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] .= ';{cook_legend},cook_enable';
if (isset($GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'])) {
    $GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] .= ';{cook_legend},cook_enable';
}

$GLOBALS['TL_DCA']['tl_page']['subpalettes']['cook_enable'] = 'cook_message,cook_button,cook_ttl,cook_url,cook_link,cook_position,cook_placement,cook_combineAssets,cook_includeCss,cook_analyticsCheckbox';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['cook_analyticsCheckbox'] = 'cook_analyticsLabel';

/*
 * Add the fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['cook_enable'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_enable'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_message'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_message'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'tl_class' => 'long', 'allowHtml' => true],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_url'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'url', 'decodeEntities' => true, 'dcaPicker' => true, 'fieldType' => 'radio', 'tl_class' => 'w50 wizard'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_position'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_position'],
    'default' => 'top',
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['top', 'bottom'],
    'reference' => &$GLOBALS['TL_LANG']['tl_page']['cook_position'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(8) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_placement'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_placement'],
    'default' => 'body_end',
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['body_end', 'before_wrapper'],
    'reference' => &$GLOBALS['TL_LANG']['tl_page']['cook_placement'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_button'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_button'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'maxlength' => 128, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_link'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_link'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_combineAssets'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_combineAssets'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_includeCss'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_includeCss'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'default' => 1,
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_ttl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_ttl'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "varchar(4) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_analyticsCheckbox'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_analyticsCheckbox'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cook_analyticsLabel'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cook_analyticsLabel'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];
