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
 * core_renderer.php
 *
 * @package   theme_uhh
 * @author    Lars Thoms <lars.thoms@uni-hamburg.de>
 * @copyright 2020 Universität Hamburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_uhh\output;

defined('MOODLE_INTERNAL') || die;


/* ====[ Core Renderer ]========================================================================= */


/**
 * Class core_renderer
 *
 * @package theme_uhh\output
 */
class core_renderer extends \core_renderer
{
    /**
     * @return mixed
     */
    public function full_header()
    {
        global $PAGE;

        $header                    = new \stdClass();
        $header->settingsmenu      = $this->context_header_settings_menu();
        $header->contextheader     = $this->context_header();
        $header->hasnavbar         = empty($PAGE->layout_options['nonavbar']);
        $header->navbar            = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader      = $this->course_header();
        $url                       = $this->get_logo_url();
        if($url)
        {
            $url = $url->out(false);
        }
        $header->logourl = $url;

        return $this->render_from_template('theme_boost/header', $header);
    }


    /**
     * Renders the login form.
     *
     * @param \core_auth\output\login $form The renderable.
     * @return string
     */
    public function render_login(\core_auth\output\login $form)
    {
        global $CFG, $SITE;

        $context = $form->export_for_template($this);

        // Override because rendering is not supported in template yet.
        if($CFG->rememberusername == 0)
        {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabledonlysession');
        }
        else
        {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabled');
        }
        $context->errorformatted = $this->error_text($context->error);
        $url                     = $this->get_logo_url();
        if($url)
        {
            $url = $url->out(false);
        }
        $context->logourl    = $url;
        $context->sitename   = format_string(
            $SITE->fullname,
            true,
            ['context' => \context_course::instance(SITEID), "escape" => false]
        );
        $context->login_hint = get_config('theme_uhh', 'login_hint');

        return $this->render_from_template('theme_boost/core/loginform', $context);
    }
}
