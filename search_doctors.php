<?php
header('Content-Type: application/json');

require_once 'config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    $query = "SELECT StaffID as id, Name as name, Criteria as specialty, Dp as image, ContactNumber as phone 
              FROM Staff 
              WHERE Position = 'Doctor' 
              AND (Name LIKE :search 
              OR StaffID LIKE :search 
              OR Criteria LIKE :search)
              ORDER BY Name ASC";
    
    $stmt = $db->prepare($query);
    $searchPattern = "%$search%";
    $stmt->bindParam(':search', $searchPattern);
    $stmt->execute();
    
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($doctors as &$doctor) {
        $doctor['rating'] = rand(40, 50) / 10;
        $doctor['experience'] = rand(5, 20) . " years";
        $doctor['availability'] = "Mon-Fri";
        if (empty($doctor['image'])) {
            $doctor['image'] = 'assets/img/default-doctor.png';
        }
    }
    
    echo json_encode($doctors);
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>