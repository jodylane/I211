<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/15/2018
 * Time: 2:24 PM
 * Description: This file was created to
 */
class UndergradStudent extends Student {
    private $status; // as students status such as freshman, sophomore, junior, senior
    private static $student_count = 0;
    public function __construct($name, $gender, $major, $gpa, $status) {
        parent::__construct($name, $gender, $major, $gpa);
        $this->status = $status;
        self::$student_count++;
    }

    // retrieve a students status
    public function getStatus(){
        return $this->status;
    }

    // set a students status
    public function setStatus($status){
        $this->status = $status;
    }
    public static function getStudentCount () {
        return self::$student_count;
    }

    public function toString() {
        parent::toString();
        echo "Status: ", $this->getStatus();
    }

}