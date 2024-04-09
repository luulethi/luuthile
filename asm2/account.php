<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url(https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Natural-Wood-Panels-Simple-Background-Image.jpeg);
            background-size: cover; /* Hình nền sẽ được co giãn hoặc thu nhỏ để phù hợp với kích thước của cửa sổ trình duyệt */
            background-position: center; /* Hiển thị hình ảnh ở giữa trung tâm */
            background-repeat: no-repeat; /* Không lặp lại hình nền */
            
        }

        .container {
            max-width: 90%;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1); /* Màu nền trong suốt */
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            color: #fff;
        }

        table th {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        }

        .add-button {
            background-color: #4CAF50; /* Màu xanh lá cây */
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .sign-out-button {
            text-decoration: none;
            color: #333;
            background-color: #4CAF50; /* Màu xanh lá cây */
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .sign-out-button:hover {
            color: #666;
        }
        /* CSS cho nút "Edit" */
        .edit-btn {
            background-color: #4CAF50; /* Màu nền */
            color: white; /* Màu chữ */
            padding: 8px 16px; /* Khoảng cách padding */
            text-align: center; /* Canh giữa văn bản */
            text-decoration: none; /* Không gạch chân */
            display: inline-block; /* Hiển thị dạng khối nội dung */
            border-radius: 4px; /* Bo tròn góc */
        }

        /* CSS cho nút "Delete" */
        .delete-btn {
            background-color: #f44336; /* Màu nền */
            color: white; /* Màu chữ */
            padding: 8px 16px; /* Khoảng cách padding */
            text-align: center; /* Canh giữa văn bản */
            text-decoration: none; /* Không gạch chân */
            display: inline-block; /* Hiển thị dạng khối nội dung */
            border-radius: 4px; /* Bo tròn góc */
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Account Management</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password (Hashed)</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "btec_sdlc_asm2";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, username, password, email FROM accounts";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>"; // Hiển thị giá trị đã được băm
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td><a class='edit-btn' href='edit_account.php?id=" . $row["id"] . "'>Edit</a> | <a class='delete-btn' href='delete_account.php?id=" . $row["id"] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='error-message'>No accounts found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="buttons">
            <a class="add-button" href="add_account.php">Add</a>
            <a href="signin.php" class="sign-out-button">Sign Out</a>
        </div>
    </div>
</body>
</html>

