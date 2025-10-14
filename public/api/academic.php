<?php
/**
 * Academic Management API
 * Handles CRUD operations for academic entities
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Simple routing
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', trim($path, '/'));

// API endpoint: /api/academic/data
if ($pathParts[2] === 'academic' && $pathParts[3] === 'data') {
    handleAcademicData($method);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}

function handleAcademicData($method) {
    switch ($method) {
        case 'GET':
            getAcademicData();
            break;
        case 'POST':
            createAcademicData();
            break;
        case 'PUT':
            updateAcademicData();
            break;
        case 'DELETE':
            deleteAcademicData();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
    }
}

function getAcademicData() {
    // Sample data - replace with database queries
    $data = [
        'departments' => [
            ['id' => 'DEPT001', 'name' => 'Computer Science', 'code' => 'CS', 'head' => 'Dr. John Smith', 'staffCount' => 15],
            ['id' => 'DEPT002', 'name' => 'Mathematics', 'code' => 'MATH', 'head' => 'Dr. Sarah Johnson', 'staffCount' => 12]
        ],
        'batches' => [
            ['id' => 'BATCH001', 'name' => '2024-2025', 'year' => '2024', 'department' => 'Computer Science', 'students' => 150]
        ],
        'grades' => [
            ['id' => 'GRADE001', 'name' => 'Grade 7', 'level' => '7', 'category' => 'Primary', 'classes' => 3]
        ],
        'rooms' => [
            ['id' => 'ROOM001', 'number' => 'A101', 'type' => 'Classroom', 'capacity' => 30, 'status' => 'Available']
        ],
        'classes' => [
            ['id' => 'CLASS001', 'name' => 'Grade 7-A', 'grade' => 'Grade 7', 'section' => 'A', 'students' => 30]
        ],
        'subjects' => [
            ['id' => 'SUB001', 'name' => 'Mathematics', 'code' => 'MATH', 'credits' => 4, 'category' => 'Core']
        ]
    ];
    
    echo json_encode($data);
}

function createAcademicData() {
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Validate input
    if (!isset($input['type']) || !isset($input['data'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        return;
    }
    
    // Generate ID and save (in real app, save to database)
    $input['data']['id'] = strtoupper($input['type']) . date('YmdHis');
    
    echo json_encode(['success' => true, 'data' => $input['data']]);
}

function updateAcademicData() {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['id']) || !isset($input['data'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        return;
    }
    
    // Update logic here
    echo json_encode(['success' => true, 'message' => 'Updated successfully']);
}

function deleteAcademicData() {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['id'])) {
        http_response_code(400);
        echo json_encode(['error' => 'ID required']);
        return;
    }
    
    // Delete logic here
    echo json_encode(['success' => true, 'message' => 'Deleted successfully']);
}
?>
