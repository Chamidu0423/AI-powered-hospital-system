<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid session']);
    exit;
}

$password = $_POST['password'] ?? '';
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role']; 

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM Login WHERE UserID = ? AND Position = ?";
$stmt = $db->prepare($query);
$stmt->execute([$user_id, $role]);

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (password_verify($password, $user['Password'])) {
        $_SESSION['authenticated'] = true;
        $_SESSION['user_data'] = $user;
        
        // Convert role to lowercase for consistent matching
        $roleKey = strtolower(trim($role)); // Ensure no leading/trailing spaces

        
          // Debug log to check the role
          error_log("Role: " . $role);

          $redirect = match($roleKey) {
            'patient' => 'patient/profile.php',
            'doctor' => 'Doctor/DoctorDashboard.php',
            'laboratorist' => 'admin/laboratory.php', // Change 'Laboratorist' to lowercase
            'pharmacist' => 'admin/pharmacy.php',
            default => 'index.php'
        };
        
        
        echo json_encode(['success' => true, 'redirect' => $redirect]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid password']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not found']);
}
?>