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
 * version.php
 *
 * @package   theme_uhh
 * @author    Lars Thoms <lars.thoms@uni-hamburg.de>
 * @copyright 2020 Universität Hamburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/* ====[ Version / Dependencies ]================================================================ */

// Version of the theme
$plugin->version = 2020052500;
$plugin->release = '1.0';

// Minimal version of Moodle
$plugin->requires = 2018120303;

// Maturity
$plugin->maturity = MATURITY_STABLE;

// Component name of the theme
$plugin->component = 'theme_uhh';

// Dependency list
$plugin->dependencies = ['theme_boost' => 2019111800];
