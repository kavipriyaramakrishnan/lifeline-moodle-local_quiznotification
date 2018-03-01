<?php
namespace local_quiznotification;
require_once($CFG->dirroot.'/user/profile/lib.php');
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/local/quiznotification/locallib.php');
/**
 * Class local_quiznotification_observer
 *
 * Class definition
 *
 */
class observer {
    /**
     * Handler function
     *
     * @param object $payload  event data payload
     * @return void
     */
    public static function notificationemail(\core\event\user_graded $event) {
        global $DB, $CFG;
        $grade_gradesid = $event->objectid;
        $userid = $DB->get_field('grade_grades', 'userid', array('id' => $grade_gradesid));

	    quiznotification_email($userid, $event->courseid, $grade_gradesid);
    }
}
