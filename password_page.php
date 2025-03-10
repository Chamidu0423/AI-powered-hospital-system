<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header('Location: index.php');
    exit;
}
$role = $_SESSION['role'];
$role_label = ucfirst($role);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .password-container {
            max-width: 500px;
            width: 100%;
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .password-container:hover {
            transform: translateY(-5px);
        }
        h3 {
            color: #1a237e;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            background-color: #f8f9fa;
            border: none;
            border-radius: 8px;
            padding: 1rem;
            font-size: 1rem;
            color: #2c3e50;
            transition: all 0.3s ease;
            width: 100%;
        }
        .form-control:focus {
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 97, 242, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #0061f2 0%, #00c6f9 100%);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 97, 242, 0.3);
        }
        .alert-danger {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #ff6b6b;
            color: #2c3e50;
            font-size: 0.9rem;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="password-container">
        <h3>Enter <?php echo htmlspecialchars($role_label); ?> Password</h3>
        <form id="passwordForm">
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div id="errorMessage" class="alert-danger mt-3" style="display: none;"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#passwordForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'verify_password.php',
                    method: 'POST',
                    data: {
                        password: $('#password').val()
                    },
                    success: function(response) {
                        const data = JSON.parse(response);
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            $('#errorMessage').text(data.message).show();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>