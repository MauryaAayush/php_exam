<?php

header("Access-Control-Allow-Methods: POST, PATCH");
header("Content-Type: application/json");

include("../config/database.php");

$courseActions = new DatabaseConfig();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $courseName = $_POST['name'];
    $courseDescription = $_POST['description'];

    if (!empty($courseName) && !empty($courseDescription)) {
        $result = $courseActions->addCourse($courseName, $courseDescription);
        $response['message'] = $result ? 'Course added successfully!' : 'Failed to add course!';
    } else {
        $response['error'] = 'Please provide all required fields!';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == 'PATCH') {
    $inputData = file_get_contents("php://input");
    parse_str($inputData, $parsedData);
    $courseId = $parsedData['id'];
    $courseName = $parsedData['name'];
    $courseDescription = $parsedData['description'];

    if (!empty($courseId) && !empty($courseName) && !empty($courseDescription)) {
        $result = $courseActions->updateCourse($courseId, $courseName, $courseDescription);
        $response['message'] = $result ? 'Course updated successfully!' : 'Failed to update course!';
    } else {
        $response['error'] = 'Please provide all required fields!';
    }
} else {
    $response['error'] = 'Only POST and PATCH methods are allowed!';
}

echo json_encode($response);
