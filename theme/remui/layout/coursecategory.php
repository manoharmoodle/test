<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Edwiser RemUI
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $USER, $SITE, $COURSE;


if (stripos($PAGE->url->get_path(), '/course/index.php') !== false) {

    require_once('common.php');

    // Generate page url.
    $pageurl = new moodle_url('/course/index.php');
    $mycourses  = optional_param('mycourses', 0, PARAM_INT);

    // Get the filters first.
    $filterdata = \theme_remui_coursehandler::get_course_filters_data();

    $templatecontext['hasregionmainsettingsmenu'] = !$OUTPUT->region_main_settings_menu();

    $pagelayout = get_config('theme_remui', 'categorypagelayout');

    if ($pagelayout !== "0") {
        $pagelayout = 'layout'.$pagelayout;
        $templatecontext[$pagelayout] = true;
    } else {
        $templatecontext['oldlayout'] = true;
    }

    $templatecontext['categories'] = $filterdata['catdata'];
    $templatecontext['searchhtml'] = $filterdata['searchhtml'];

    if (isset($templatecontext['oldlayout']) && $templatecontext['oldlayout'] == true) {
        $templatecontext['tabcontent'] = array();

        if (isloggedin()) {
            // Tab creation Content.
            $mycoursesobj = new stdClass();
            $mycoursesobj->name = 'mycourses';
            $mycoursesobj->text = get_string('mycourses', 'theme_remui');
            if ($mycourses) {
                $mycoursesobj->isActive = true;
            }
            $templatecontext['tabcontent'][] = $mycoursesobj;
        }

        $coursesobj = new stdClass();
        $coursesobj->name = 'courses';
        $coursesobj->text = get_string('courses', 'theme_remui');
        if (!$mycourses) {
            $coursesobj->isActive = true;
        }
        $templatecontext['tabcontent'][] = $coursesobj;

        $templatecontext['mycourses'] = $mycourses;
    }

    if (\theme_remui\toolbox::get_setting('enablenewcoursecards')) {
        $templatecontext['latest_card'] = true;
    }

    $categoryid = 'all';
    $categoryid = optional_param('category', $categoryid, PARAM_RAW);

    if ($categoryid != 'all') {
        if (core_course_category::get($categoryid, IGNORE_MISSING) == null) {
            $categoryid = 'all';
        }
    }

    $templatecontext['defaultcat'] = $categoryid;
    if (isloggedin()) {
        $templatecontext["showmycourses"] = true;
    }
    echo $OUTPUT->render_from_template('theme_remui/coursearchive', $templatecontext);
} else {
    require_once('columns2.php');
}
