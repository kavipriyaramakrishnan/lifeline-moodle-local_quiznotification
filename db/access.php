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

$capabilities = array (
    'local/quiznotification:config' => array(
        'riskbitmask'  => RISK_CONFIG & RISK_PERSONAL & RISK_SPAM,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes'   => array (
            'manager' => CAP_ALLOW
        )
    ),
);
