<?php 
    require_once "include/header.php";
?>


<?php


require_once "../connection.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchRole = $_POST["searchRole"];

    // SQL query to search for an employee by name
    $sql = "SELECT * FROM employee WHERE Role LIKE '%$searchRole%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Search Results:</h3>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>ID: " . $row["id"] . " | Name: " . $row["name"] . " | Role: " . $row["Role"] ." | Email: " . $row["email"] ." | Phone: " . $row["Phone"] ." | Salary: " . $row["salary"] ." | Department: " . $row["Department"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No results found for '$searchRole'.</p>";
    }
}

$conn->close();
?>

<?php 
    require_once "include/footer.php";
?>