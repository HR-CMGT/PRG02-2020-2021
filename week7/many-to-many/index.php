<?php
/** @var mysqli $db */
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT s.*, cl.name AS class_name, co.name AS course_name
            FROM students AS s
            INNER JOIN classes AS cl ON s.class_id = cl.id
            INNER JOIN course_student AS cs ON s.id = cs.student_id
            INNER JOIN courses AS co ON cs.course_id = co.id
            WHERE s.lastname LIKE '%R%'
            ORDER BY s.lastname ASC";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$students = [];
while ($row = mysqli_fetch_assoc($result)) {
    $students[$row['id']][] = $row;
}

//Close connection
mysqli_close($db);

print_r($students);
