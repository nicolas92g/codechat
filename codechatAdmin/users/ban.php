<?php
include('../pages/utils.php');
checkSessionAdminElseLogin('../');


include ('../../database.php');
$db = getDatabase();

$user = htmlspecialchars($_GET['user']);

if (!isset($_GET['user']) && empty($_GET['user'])){
    header('location: searchUsers/index.php?msg=user not found&err=true');
    exit;
}

$cmdCheck = $db->prepare('SELECT EXISTS(SELECT * FROM user WHERE pseudo = ?)');
$cmdCheck->execute([$user]);
$users = $cmdCheck->fetch();

if ($users > 0){
    $cmd = $db->prepare('UPDATE user SET banned=1 WHERE pseudo = ?');
    $cmd->execute([$user]);
    header('location: searchUsers/index.php?msg=user banned&err=false');
} else {
    header('location: searchUsers/index.php?msg=user can\'t banned&err=true');
}
