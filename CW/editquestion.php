<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';
try{
    if(isset($_POST['questiontext'])){
        updateQuestion($pdo, $_POST['questionid'], $_POST['questiontext'], $_POST['modules'], $_POST['users']);
        header('location: questions.php');
    }else{
        $question = getQuestion($pdo, $_GET['id']);
        $title = "Edit post";
        $users = allUsers($pdo);
        $modules = allModules($pdo);

        ob_start();
        include 'template/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing post: ' .$e->getMessage();
}
include 'template/layout.html.php';