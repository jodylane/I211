<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/27/2018
 * Time: 2:27 PM
 * Description: This file was created to
 */
class MedicalStudent extends GradStudent {
    private $mcat; //MCAT score
    private static $student_count; //static variable to store the number of students

    public function __construct($name, $gender, $major, $gpa, $program, $mcat) {
        parent::__construct($name, $gender, $major, $gpa, $program);
        $this->mcat = $mcat;
        self::$student_count++;
    }

    // retrieve mcat score
    public function getMcat() {
        return $this->mcat;
    }

    // retrieve number of students
    public static function getStudentCount() {
        return self::$student_count;
    }

    // set mcat score
    public function setMcat ($mcat) {
        $this->mcat = $mcat;
    }

    // displays a string representation of a medical student object
    public function toString() {
        parent::toString();
        echo "<br>MCAT: " . $this->getMcat();
    }
}