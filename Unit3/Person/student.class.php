<?php
/*
 * Author: Louie Zhu
 * Date: 2/10/2015
 * Name: student.class.php
 * Description: The Student models a student. The class inherits from the Person class.
 */
class Student extends Person {
	
	//private data members for a student's major and gpa
    private $major, $gpa;
    private static $student_count = 0;

    public function __construct($name, $gender, $major, $gpa) {
        parent::__construct($name, $gender);
        $this->major = $major;
        $this->gpa = $gpa;
        self::$student_count++;
    }

	//public get methods
    public function getMajor() {
        return $this->major;
    }

    public function getGPA() {
        return $this->gpa;
    }

    public static function getStudentCount () {
        return self::$student_count;
    }

	//public set methods
    public function setMajor($major) {
        $this->major = $major;
    }

    public function setGPA($gpa) {
        $this->gpa = $gpa;
    }

    public function toString() {
        parent::toString();
        echo "Major: ", $this->getMajor(), "<br>";
        printf ("GPA: %.2f<br>", $this->getGPA());
    }


} //end of class
?>
