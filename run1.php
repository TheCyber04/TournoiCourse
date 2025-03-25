<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .btn {
        padding: 6px 12px;
        text-decoration: none;
        color: white;
        background-color: #4CAF50;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn.edit {
        background-color: #008CBA;
    }

    .btn.edit:hover {
        background-color: #007B9E;
    }

    .btn.delete {
        background-color: #f44336;
    }

    .btn.delete:hover {
        background-color: #e31b0c;
    }
</style>
</head>
<body>
    
</body>
</html>
<?php
include("sql.php");
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);


$sql="SELECT * FROM athelete a JOIN course_athelete c ON a.id=c.athelete_id WHERE c.course_id=1;";
$result= $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>name</th><th>first_name</th><th>nationality</th><th>status</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["firstname"]) . "</td>
                <td>" . htmlspecialchars($row["nationality"]) . "</td>
                <td>" . htmlspecialchars($row["status"]) . "</td>
               
          
        
              </tr>";
    }
    echo "</table>";
} else {
    echo "Aucun athlète trouvé.";
}



?>
