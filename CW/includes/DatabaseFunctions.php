<?php
function query($pdo, $sql, $parameters = []) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($parameters);
    return $stmt;
}

function totalQuestions($pdo) {
    $query = $pdo->prepare('SELECT COUNT(*) FROM question');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}

function getQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query( $pdo,'SELECT 
                                question.*, 
                                user.name AS username, 
                                module.moduleName AS moduleName FROM question
                                INNER JOIN user ON question.userid = user.id
                                INNER JOIN module ON question.moduleid = module.id
                                WHERE question.id = :id',
                                $parameters);
                                return $query->fetch();
}

function updateQuestion($pdo, $questionId, $questiontext, $moduleid, $userid) {
    $query = 'UPDATE question SET questiontext = :questiontext , moduleid = :moduleid , userid = :userid WHERE id = :id';
    $parameters = [':questiontext' => $questiontext, ':id' => $questionId , ':moduleid' => $moduleid , ':userid' => $userid];
    $stmt = query($pdo, $query, $parameters);
    return $stmt->rowCount(); 
}
function deleteQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}
function insertQuestion($pdo, $questiontext, $fileToUpload, $userid, $moduleid) {
    $query = 'INSERT INTO question (questiontext, questiondate, `image`, userid, moduleid)
    VALUES (:questiontext, CURDATE(), :fileToUpload, :userid, :moduleid)';
    $parameters = [':questiontext' => $questiontext , ':fileToUpload' => $fileToUpload , ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}
function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}
function allModules($pdo) {
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}
function allQuestions($pdo) {
    $questions = query($pdo, 'SELECT question.id, `name`, email, moduleName, questiondate, questiontext, `image` FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $questions->fetchAll();
}