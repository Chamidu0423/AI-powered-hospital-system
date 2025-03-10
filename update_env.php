<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_POST['admin_id'];
    $admin_password = $_POST['admin_password'];

    // Validate inputs
    if (!empty($admin_id) && !empty($admin_password)) {
        // Read the .env file
        $env_file = __DIR__ . '/.env';
        $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Update the ADMIN_ID and ADMIN_PASSWORD
        $updated_lines = [];
        foreach ($lines as $line) {
            if (strpos($line, 'ADMIN_ID=') === 0) {
                $line = "ADMIN_ID=$admin_id";
            } elseif (strpos($line, 'ADMIN_PASSWORD=') === 0) {
                $line = "ADMIN_PASSWORD=$admin_password";
            }
            $updated_lines[] = $line;
        }

        // Write the updated lines back to the .env file
        file_put_contents($env_file, implode(PHP_EOL, $updated_lines) . PHP_EOL);

        $message = "<p style='color: green;'>Admin credentials updated successfully!</p>";
    } else {
        $message = "<p style='color: red;'>Please fill in both fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Credentials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Admin Credentials</h1>
        <?php if (isset($message)) echo $message; ?>
        <form action="" method="POST">
            <label for="admin_id">Admin ID:</label>
            <input type="text" id="admin_id" name="admin_id" required>

            <label for="admin_password">Admin Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>