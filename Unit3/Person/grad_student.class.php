<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/15/2018
 * Time: 2:20 PM
 * Description: This file was created to
 */
class GradStudent extends Student {
    private $program;
    private static $student_count = 0;

    public function __construct($name, $gender, $major, $gpa, $program) {
        parent::__construct($name, $gender, $major, $gpa);
        $this->program = $program;
        self::$student_count++;
    }

    // retrieve a students program
    public function getProgram() {
        return $this->program;
    }
    // set a students program
    public function setProgram($program) {
        $this->program = $program;
    }

    public static function getStudentCount () {
        return self::$student_count;
    }

    public function toString() {
        parent::toString();
        echo "Program: ", $this->getProgram();
    }

}