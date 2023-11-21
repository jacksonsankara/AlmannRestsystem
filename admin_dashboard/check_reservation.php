<?php
include'config.php';

// Fetch data from database
$sql = "SELECT * FROM reservation";
$result = mysqli_query($conn, $sql);

// Display data in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Name</th>";
    echo "<th>email</th>";
    echo "<th>phone</th>";
    echo "<th>Date & Time</th>";
    echo "<th>No Of People</th>";
    echo "<th>message</th>";
    echo "<th>action</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["book_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["datetime_"] . "</td>";
        echo "<td>" . $row["numberofpeople"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>";
        echo "<a href='edit.php?user_id=" . $row["book_id"] . "'><button>Edit</button></a>";
        echo "<a href='delete.php?user_id=" . $row["book_id"] . "'><button>Delete</button></a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
