<?php

header("Access-Control-Allow-Methods: POST, DELETE");
header("Content-Type: application/json");

include("../config/database.php");

$enrollmentActions = new DatabaseConfig();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $studentId = $_POST['student_id'];
    $courseId = $_POST['course_id'];
    $enrollDate = $_POST['enrollment_date'];

    if (!empty($studentId) && !empty($courseId) && !empty($enrollDate)) {
        $result = $enrollmentActions->addEnrollment($studentId, $courseId, $enrollDate);
        $response['message'] = $result ? 'Enrollment added successfully!' : 'Failed to add enrollment!';
    } else {
        $response['error'] = 'Please provide all required fields!';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == 'DELETE') {
    $inputData = file_get_contents("php://input");
    parse_str($inputData, $parsedData);
    $enrollmentId = $parsedData['id'];

    if (!empty($enrollmentId)) {
        $result = $enrollmentActions->deleteEnrollment($enrollmentId);
        $response['message'] = $result ? 'Enrollment deleted successfully!' : 'Failed to delete enrollment!';
    } else {
        $response['error'] = 'Please provide the enrollment ID!';
    }
} else {
    $response['error'] = 'Only POST and DELETE methods are allowed!';
}


echo json_encode($response);
