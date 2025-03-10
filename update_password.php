<?php
session_start();
require_once 'config/database.php';
require_once 'includes/auth_utils.php';

header('Content-Type: application/json');

if (!isValidSession()) {
    echo json_encode(['success' => false, 'message' => 'Invalid session']);
    exit;
}

$password = $_POST['password'] ?? '';
$user_id = $_SESSION['user_id'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    $database = new Database();
    $db = $database->getConnection();

    $query = "UPDATE Login SET Password = ? WHERE UserID = ?";
    $stmt = $db->prepare($query);
    $result = $stmt->execute([$hashed_password, $user_id]);

    if ($result) {
        session_destroy();
        echo json_encode([
            'success' => true,
            'message' => 'Password setup completed successfully! Please relogin with your new password.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to update password!'
        ]);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred. Please try again!'
    ]);
}
?>