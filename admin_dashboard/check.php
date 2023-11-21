<?php
include'config.php';

// Fetch data from database
$sql = "SELECT * FROM administration";
$result = mysqli_query($conn, $sql);

// Display data in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>USER ID</th>";
    echo "<th>UserName</th>";
    echo "<th>email</th>";
    echo "<th>role</th>";
    echo "<th>password</th>";
    echo "<th>action</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>";
        echo "<a href='edit.php?user_id=" . $row["user_id"] . "'><button>Edit</button></a>";
        echo "<a href='delete.php?user_id=" . $row["user_id"] . "'><button>Delete</button></a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
