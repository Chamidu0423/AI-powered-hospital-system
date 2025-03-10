<?php
session_start();
require_once 'config/database.php';

header('Content-Type: application/json');

try {
    $dotenv = parse_ini_file('.env');
    if ($dotenv === false) {
        throw new Exception("Error reading .env file");
    }

    $admin_id = $dotenv['ADMIN_ID'];
    $admin_password = $dotenv['ADMIN_PASSWORD'];

    $user_id = $_POST['user_id'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($user_id === $admin_id) {
        if ($password === $admin_password) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = 'admin';
            $_SESSION['authenticated'] = true;
            echo json_encode(['success' => true, 'redirect' => 'admin/index.php']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid admin credentials']);
        }
        exit;
    }

    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM Login WHERE UserID = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$user_id]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['UserID'];
        $_SESSION['role'] = strtolower($user['Position']); // Normalize role to lowercase

        if ($user['Password'] === null) {
            $_SESSION['authenticated'] = false;
            echo json_encode(['success' => true, 'redirect' => 'create_password.php']);
        } else {
            $_SESSION['authenticated'] = false; // Will be set to true after password verification
            $redirect = match(strtolower($user['Position'])) {
                'patient' => 'password_page.php',
                'doctor' => 'password_page.php',
                'pharmacist' => 'password_page.php',
                'laboratorist' => 'password_page.php',
                default => 'index.php'
            };
            echo json_encode(['success' => true, 'redirect' => $redirect]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid user ID']);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again.']);
}
?>