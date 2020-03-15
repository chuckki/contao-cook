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
 * Fields.
 */
$GLOBALS['TL_LANG']['tl_page']['cook_enable'] = [
    'Enable cook',
    'Display the cookie information bar on the website.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_message'] = [
    'Cookies information',
    'Please enter a short information about the cookies.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_url'] = [
    'cook link URL',
    'Here you can enter the URL with more information about the cookies.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_position'] = ['cook position', 'Here you can choose the cook position.'];
$GLOBALS['TL_LANG']['tl_page']['cook_placement'] = [
    'cook placement in DOM',
    'Here you can choose the cook placement in DOM structure.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_button'] = [
    'cook button label',
    'Please enter the accept button label (e.g. <em>Accept</em>).',
];
$GLOBALS['TL_LANG']['tl_page']['cook_link'] = [
    'cook link title',
    'Here you can enter a custom link title (e.g. <em>Read more</em>).',
];
$GLOBALS['TL_LANG']['tl_page']['cook_combineAssets'] = [
    'Combine cook assets',
    'Adds the cook CSS and JS assets to the combined file.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_includeCss'] = [
    'Include cook default CSS',
    'Include the default stylesof cook.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_ttl'] = [
    'cook display interval (days)',
    'Here you can enter a custom number of days before the cook will be displayed again. If none provided, the default value will be used.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_analyticsCheckbox'] = [
    'Add the analytics checkbox',
    'Add the checkbox that allows to opt-in/out from the analytics used on the page. <strong>IMPORTANT:</strong> please refer to the official documentation how to use it.',
];
$GLOBALS['TL_LANG']['tl_page']['cook_analyticsLabel'] = [
    'Analytics checkbox label',
    'Here you can enter a custom analytics checkbox label.',
];

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_page']['cook_legend'] = 'Cookie information';

/*
 * Reference
 */
$GLOBALS['TL_LANG']['tl_page']['cook_position']['top'] = 'Top of the page';
$GLOBALS['TL_LANG']['tl_page']['cook_position']['bottom'] = 'Bottom of the page';
$GLOBALS['TL_LANG']['tl_page']['cook_placement']['before_wrapper'] = 'Before the #wrapper';
$GLOBALS['TL_LANG']['tl_page']['cook_placement']['body_end'] = 'Before &lt;body&gt; end';
