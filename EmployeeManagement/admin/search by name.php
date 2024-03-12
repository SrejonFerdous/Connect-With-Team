<?php 
    require_once "include/header.php";
?>


<?php


require_once "../connection.php";

// Process search request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchName = $_POST["searchName"];

    // SQL query to search for an employee by name
    $sql = "SELECT * FROM employee WHERE name LIKE '%$searchName%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Search Results:</h3>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>ID: " . $row["id"] . " | Name: " . $row["name"] . " | Role: " . $row["Role"] ." | Email: " . $row["email"] ." | Phone: " . $row["Phone"] ." | Salary: " . $row["salary"] ." | Department: " . $row["Department"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No results found for '$searchName'.</p>";
    }
}

$conn->close();
?>

<?php 
    require_once "include/footer.php";
?>