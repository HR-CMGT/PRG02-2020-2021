<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Set form data
    $formData = new \System\Form\Data($_POST);

    //Set post variables
    $email = $formData->getPostVar('email');
    $password = $formData->getPostVar('password');

    //Init the database
    $db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Get the record from the db
    try {
        $user = \System\Users\User::getByEmail($email, $db->getConnection());
    } catch (Exception $e) {
        $user = new \System\Users\User();
    }

    //Actual validation
    $validator = new \System\Form\Validation\LoginValidator($user, $password);
    $validator->validate();
    $errors = $validator->getErrors();
}
