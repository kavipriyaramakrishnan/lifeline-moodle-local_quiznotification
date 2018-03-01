<?php
defined('MOODLE_INTERNAL') || die();

function quiznotification_email($userid, $courseid, $gradesid) {
    global $DB, $CFG;
    // Get the event fields.
    $course = $DB->get_record('course', array('id' => $courseid));
    $user = $DB->get_record('user', array('id' => $userid));
    $itemid = $DB->get_field('grade_grades', 'itemid', array('id' => $gradesid));
    $quizname = $DB->get_field('grade_items', 'itemname', array('id' => $itemid, 'courseid' => $courseid, 'itemmodule' => 'quiz'));

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

    $emailbody = get_string('notificationemailbody', 'local_quiznotification', $a);
    $emailsub = get_string('notificationemailsub', 'local_quiznotification');
    if ($courseid == 193) {
        $ret = email_to_user($to, $from, $emailsub, $emailbody);
    }
}
