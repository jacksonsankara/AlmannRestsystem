<?php
include'config.php';

// Fetch data from database
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

// Display data in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Client ID</th>";
    echo "<th>Name</th>";
    echo "<th>email</th>";
    echo "<th>subject</th>";
    echo "<th>message</th>";
    echo "<th>action</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["client_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>";
        echo "<a href='edit.php?user_id=" . $row["client_id"] . "'><button>Edit</button></a>";
        echo "<a href='delete.php?user_id=" . $row["client_id"] . "'><button>Delete</button></a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
