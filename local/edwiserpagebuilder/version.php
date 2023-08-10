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
 * Version details.
 *
 * @package   local_edwiser_page_builder
 * @copyright 2014 Daniel Neis Araujo
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Sudam Chakor
 */

defined( 'MOODLE_INTERNAL' ) || die();

$plugin->version   = 2022031500;      // The current module version (Date: YYYYMMDDXX).
$plugin->requires  = 2020061500;      // Requires this Moodle version.
$plugin->component = 'local_edwiserpagebuilder';// Full name of the plugin (used for diagnostics).
// $plugin->cron      = 0;
$plugin->maturity  = MATURITY_STABLE;
$plugin->release   = '1.0.2';
