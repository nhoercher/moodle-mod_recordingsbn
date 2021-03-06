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
 * Class for the structure used for backup RecordingsBN.
 *
 * @package    mod_recordingsbn
 * @subpackage recordingsbn
 * @copyright  2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 defined('MOODLE_INTERNAL') || die;

/**
 * Define all the backup steps that will be used by the backup_recordingsbn_activity_task
 *
 * @copyright 2010-2017 Blindside Networks Inc
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v2 or later
 */
class backup_recordingsbn_activity_structure_step extends backup_activity_structure_step {

    /**
     * Define the complete recordingsbn structure for backup, with file and id annotations
     */
    protected function define_structure() {

        // To know if we are including userinfo.
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated.
        $recordingsbn = new backup_nested_element('recordingsbn', array('id'), array(
            'name', 'timecreated', 'timemodified'));

        // Build the tree.
        // (love this).

        // Define sources.
        $recordingsbn->set_source_table('recordingsbn', array('id' => backup::VAR_ACTIVITYID));

        // Define id annotations.
        // (none).

        // Define file annotations.
        // (none).

        // Return the root element (recordingsbn), wrapped into standard activity structure.
        return $this->prepare_activity_structure($recordingsbn);
    }
}
