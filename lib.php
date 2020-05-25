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
 * lib.php
 *
 * @package   theme_uhh
 * @author    Lars Thoms <lars.thoms@uni-hamburg.de>
 * @copyright 2020 Universität Hamburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/* ====[ Libraries ]============================================================================= */

/**
 * Load own SCSS file before theme_boost
 *
 * @param $theme
 * @return false|string
 */
function theme_uhh_get_pre_scss($theme)
{
    global $CFG;

    return file_get_contents($CFG->dirroot . '/theme/uhh/scss/pre.scss');
}

/**
 * Load own SCSS file after theme_boost
 *
 * @param $theme
 * @return false|string
 */
function theme_uhh_get_extra_scss($theme)
{
    global $CFG;

    return file_get_contents($CFG->dirroot . '/theme/uhh/scss/post.scss');
}
