<?php
/**
 * Lifeline Quiz Notification events
 *
 * Capabilities definition 
 *
 * @package   local_quiznotification
 * @copyright pukunui
 * @author    Priya Ramakrishnan, Pukunui{@link http://pukunui.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;
$observers = array(
    array(
        'eventname' => '\core\event\user_graded',
        'callback'  => '\local_quiznotification\observer::notificationemail',
    ),
);
