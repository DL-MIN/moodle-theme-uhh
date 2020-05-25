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
 * settings.php
 *
 * @package   theme_uhh
 * @author    Lars Thoms <lars.thoms@uni-hamburg.de>
 * @copyright 2020 Universität Hamburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/* ====[ Settings ]============================================================================== */

if($ADMIN->fulltree)
{
    // Register settings
    $settings = new theme_boost_admin_settingspage_tabs(
        'themesettinguhh', get_string('configtitle', 'theme_uhh')
    );

    // General settings page
    $page = new admin_settingpage('theme_uhh_general', get_string('generalsettings', 'theme_uhh'));

    // Add link to imprint / legal notice
    $setting = new admin_setting_configtext(
        'theme_uhh/imprintlink',
        get_string('imprintlink', 'theme_uhh'),
        get_string('imprintlink_desc', 'theme_uhh'),
        '',
        PARAM_URL
    );
    $page->add($setting);

    // Add maintenance text below login form
    $setting = new admin_setting_confightmleditor(
        'theme_uhh/maintenance_text',
        get_string('maintenance_text', 'theme_uhh'),
        get_string('maintenance_text_desc', 'theme_uhh'),
        '',
        PARAM_RAW_TRIMMED
    );
    $page->add($setting);

    // Add activation checkbox of maintenance text
    $setting = new admin_setting_configcheckbox(
        'theme_uhh/maintenance_text_active',
        get_string('maintenance_text_active', 'theme_uhh'),
        get_string('maintenance_text_active_desc', 'theme_uhh'),
        '0'
    );
    $page->add($setting);

    // Flush caches and add new settings
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($page);
}
