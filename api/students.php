<?php

header("Access-Control-Allow-Methods: POST, GET");
header("Content-Type: application/json");

include("../config/database.php");

$studentActions = new DatabaseConfig();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $studentName = $_POST['name'];
    $studentEmail = $_POST['email'];
    $studentPhone = $_POST['phone'];

    if (!empty($studentName) && !empty($studentEmail) && !empty($studentPhone)) {
        $result = $studentActions->addStudent($studentName, $studentEmail, $studentPhone);
        $response['message'] = $result ? 'Student added successfully!' : 'Failed to add student!';
    } else {
        $response['error'] = 'Please provide all required fields!';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $result = $studentActions->fetchStudents();
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $response = $data ? $data : ['msg' => 'No students found!'];
} else {
    $response['error'] = 'Only POST and GET methods are allowed!';
}

echo json_encode($response);
