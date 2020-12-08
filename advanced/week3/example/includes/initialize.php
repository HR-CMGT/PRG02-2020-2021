<?php
require_once "settings.php";
require_once "classes/StudentsList/Databases/Database.php";
require_once "classes/StudentsList/SchoolClasses/HRClass.php";
require_once "classes/StudentsList/SchoolClasses/CMGTClass.php";
require_once "classes/StudentsList/Persons/Person.php";
require_once "classes/StudentsList/Persons/Student.php";

try {
    //New DB connection
    $db = new \StudentsList\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $connection = $db->getConnection();

    //Get students from DB
    $query = "SELECT * FROM students";
    $studentsFromDB = $connection->query($query)
        ->fetchAll(PDO::FETCH_CLASS, "StudentsList\\Persons\\Student");

    //Prepared statements
//    $statement = $connection->prepare("SELECT * FROM students WHERE id = :id");
//    $statement->execute([
//        ':id' => $_GET['id']
//    ]);
//
//    if ($statement->rowCount() == 1){
//        print_r($statement->fetchObject("StudentsList\\Persons\\Student"));
//        exit;
//    }

    //Transactions
//    try {
//        $connection->beginTransaction();
//        $connection->exec("UPDATE students SET interests = 'TEST'");
////        $connection->exec("UP students");
//        $connection->commit();
//    } catch (PDOException $e) {
//        $connection->rollBack();
//        print "??";
//    }

    //Create new instance for class & add students
    $cmgtClass = new \StudentsList\SchoolClasses\CMGTClass();
    $cmgtClass->addStudents($studentsFromDB);

    //Get variables for template
    $students = $cmgtClass->getStudents();
    $totalStudents = $cmgtClass->getTotalStudents();
} catch (Exception $e) {
    //Set error variable for template
    $error = "Oops, try to fix your error please: " .
        $e->getMessage() . " on line " . $e->getLine() . " of " .
        $e->getFile();
}

