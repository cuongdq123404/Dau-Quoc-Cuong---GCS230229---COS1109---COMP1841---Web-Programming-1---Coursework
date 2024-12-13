<?php
if(isset($_POST['questiontext'])){
    try{
        include 'includes/DatabaseConnection.php';
        include 'includes/DatabaseFunctions.php';
        insertQuestion($pdo, $_POST['questiontext'],$_FILES['fileToUpload']['name'],
        $_POST['users'], $_POST['modules']);
        include 'includes/uploadFile.php';
        header('location: questions.php');
    }catch (PDOException $e){
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';
    $title = 'Add a new question';
    $users = allUsers($pdo);
    $modules = allModules($pdo);
    ob_start();
    include 'template/addquestion.html.php';
    $output = ob_get_clean();
}
include 'template/layout.html.php';