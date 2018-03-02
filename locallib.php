<?php
defined('MOODLE_INTERNAL') || die();

function quiznotification_email($userid, $courseid, $gradesid, $eventuserid) {
    global $DB, $CFG;
    // Get the event fields.
    $course = $DB->get_record('course', array('id' => $courseid));
    $user = $DB->get_record('user', array('id' => $userid));
    $itemid = $DB->get_field('grade_grades', 'itemid', array('id' => $gradesid));
    $quizname = $DB->get_field('grade_items', 'itemname', array('id' => $itemid, 'courseid' => $courseid, 'itemmodule' => 'quiz'));
    if ($eventuserid !== -1) {
        // Email Quiz Submission Notification
        // Form Email.
        $from = new stdclass();
        $from->firstname = 'Site';
        $from->lastname  = 'Administrator';
        $from->email     = 'noreply@lifeline.com';


        // To Email.
        $to = new stdClass();
        $to->id        = $user->id;
        $to->firstname = $user->firstname;
        $to->lastname  = $user->lastname;
        $to->username  = $user->username;
        $to->email     = $user->email;

        $a = new \stdClass();
        $a->name = fullname($user);
        $a->quiz = $quizname;
        $a->course = $course->fullname;
        $a->link = "$CFG->wwwroot/course/view.php?id=$courseid";

        $emailbody = get_string('notificationemailbody', 'local_quiznotification', $a);
        $emailbodhtml = text_to_html($emailbody, null, false, true);
        $emailsub = get_string('notificationemailsub', 'local_quiznotification');
        if (($courseid == 193) || ($courseid == 196)) {
            $ret = email_to_user($to, $from, $emailsub, $emailbody, $emailbodhtml);
        }
    }
}
