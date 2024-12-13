<?php
require "login/Check.php";
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    
    $questions = allQuestions($pdo);
    $title = "Question list";
    $totalQuestions = totalQuestions($pdo);
    
    ob_start();
    include 'admin_questions.html.php';
    $output = ob_get_clean(); 
}catch (PDOException $e) {
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include '../template/admin_layout.html.php';