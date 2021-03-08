<?php
/* model/validate.php
 * Contains validation functions for Food app
 *
 */

//get login credentials
require($_SERVER['HOME'] . '/logincredspatrontracker.php');
//require('../views/includes/logincredspatrontracker.php');

class Validate
{
    private $_dataLayer;

    function __construct($dataLayer)
    {
        $this->_dataLayer = $dataLayer;
    }

    /** validUsername() returns true if username is not empty and
     * equals username in logincredspatrontracker.php
     * @param String $username
     * @return boolean
     */
    function validUsername($username, $adminUser)
    {
        return !empty($username) && $username == $adminUser;
    }

    /** validPassword() returns true if password is not empty and
     * equals password in logincredspatrontracker.php
     * @param String $password
     * @return boolean
     */
    function validPassword($password, $adminPassword)
    {
        return !empty($password) && $password == $adminPassword;
    }

    function validName($name)
    {
        return !empty($name) && preg_match("/^[a-zA-Z ]+$/", $name)
            || preg_match("/^[a-zA-Z]+ [a-zA-Z]+$/", $name);
    }

    function validTime($time)
    {
        return !empty($time);
    }

    function validDate($data)
    {
        return !empty($data);
    }

    function validPosition($position)
    {
        return !empty($position);
    }

    function validContactMethod($contactMethod)
    {
        return !empty($contactMethod) and in_array($contactMethod, $this->_dataLayer->getContactMethods());
    }

    function validLocation($location)
    {
        return !empty($location) && in_array($location, $this->_dataLayer->getLocations());
    }

    function validOtherLocationChosen($location)
    {
        return $location == "Other...";
    }

    function validLocationOther($locationOther)
    {
        return !empty($locationOther) && preg_match("/^[a-zA-Z ]*$/", $locationOther);
    }

    function validLocationOtherNoDuplicates($locationOther)
    {
        return !in_array($locationOther, $this->_dataLayer->getLocations());
    }

    function validQuestion($question)
    {
        return !empty($question) && in_array($question, $this->_dataLayer->getQuestions());
    }

    function validOtherQuestionChosen($question)
    {
        return $question == "Other...";
    }

    function validQuestionOther($questionOther)
    {
        return !empty($questionOther);
    }

    function validQuestionOtherNoDuplicates($questionOther)
    {
        return !in_array($questionOther, $this->_dataLayer->getQuestions());
    }

    function validIncidentReport($incidentReport)
    {
        return !empty($incidentReport);
    }

    function validIncidentReportNumber($incidentReportNumber)
    {
        return !empty($incidentReportNumber);
    }
}