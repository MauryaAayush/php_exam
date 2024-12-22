<?php

class DatabaseConfig {

    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbName = "school";
    private $dbPass = "";
    private $dbConnection;

    function __construct() {
        $this->dbConnection = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
    }

    public function addStudent($studentName, $studentEmail, $studentPhone) {
        $query = "INSERT INTO students (name, email, phone) VALUES ('$studentName', '$studentEmail', '$studentPhone')";
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }

    public function addCourse($courseName, $courseDescription) {
        $query = "INSERT INTO courses (name, description) VALUES ('$courseName', '$courseDescription')";
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }

    public function addEnrollment($studentId, $courseId, $enrollDate) {
        $query = "INSERT INTO enrollments (student_id, course_id, enrollment_date) VALUES ($studentId, $courseId, '$enrollDate')";
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }

    public function fetchStudents() {
        $query = "SELECT * FROM students";
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }

    public function updateCourse($courseId, $courseName, $courseDescription) {
        $query = "UPDATE courses SET name='$courseName', description='$courseDescription' WHERE id=$courseId";
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }

    public function deleteEnrollment($enrollmentId) {
        $query = "DELETE FROM enrollments WHERE id=$enrollmentId";
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }
}
