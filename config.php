<?php
/**
 * This file is part of Moodle.
 *
 * Moodle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Moodle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Moodle.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * config.php
 *
 * @package   theme_uhh
 * @author    Lars Thoms <lars.thoms@uni-hamburg.de>
 * @copyright 2020 Universität Hamburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/* ====[ Configurations ]======================================================================== */

// Theme name
$THEME->name = 'uhh';

// Stylesheets
$THEME->sheets = [];

// Stylesheets for TinyMCE text editor
$THEME->editor_sheets = [];

// Parent theme
$THEME->parents = ['boost'];

// Floating dock
$THEME->enable_dock = false;

// Not needed
$THEME->yuicssmodules = [];

// Set renderer factory
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Dependency list for blocks
$THEME->requiredblocks = '';

// Remove "Add a block" block
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

/**
 * Set SCSS file
 *
 * @param $theme
 * @return mixed
 */
$THEME->scss = function($theme)
{
    return theme_boost_get_main_scss_content(theme_config::load('boost'));
};

// Additional SCSS settings loaded before
$THEME->prescsscallback   = 'theme_uhh_get_pre_scss';
$THEME->extrascsscallback = 'theme_uhh_get_extra_scss';

// Additional javascript files
$THEME->javascripts_footer = ['exambrowser'];

$THEME->layouts = [

    // Most backwards compatible layout without the blocks - this is the layout used by default.
    'base'     => [
        'file'    => 'columns2.php',
        'regions' => [],
    ],

    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // Main course page.
    'course'   => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
        'options'       => ['langmenu' => true],
    ],

    'coursecategory' => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // Part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse'       => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // The site home page
    'frontpage'      => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
        'options'       => ['nonavbar' => true],
    ],
    // Server administration scripts.
    'admin'          => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // My dashboard page
    'mydashboard'    => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
        'options'       => ['nonavbar' => true, 'langmenu' => true, 'nocontextheader' => true],
    ],

    // My public page
    'mypublic'       => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // Login page
    'login'          => [
        'file'    => 'login.php',
        'regions' => [],
        'options' => ['langmenu' => true],
    ],

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup'          => [
        'file'    => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],

    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop'       => [
        'file'    => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nocoursefooter' => true],
    ],

    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded'       => [
        'file'    => 'embedded.php',
        'regions' => []
    ],

    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance'    => [
        'file'    => 'maintenance.php',
        'regions' => [],
    ],

    // Should display the content and basic headers only
    'print'          => [
        'file'    => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => false],
    ],

    // The page layout used when a redirection occured
    'redirect'       => [
        'file'    => 'embedded.php',
        'regions' => [],
    ],

    // The page layout used for reports.
    'report'         => [
        'file'          => 'columns2.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // The page layout used for safebrowser and secure window.
    'secure'         => [
        'file'          => 'secure.php',
        'regions'       => ['side-pre'],
        'defaultregion' => 'side-pre'
    ]
];
