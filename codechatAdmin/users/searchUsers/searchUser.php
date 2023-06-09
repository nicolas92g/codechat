<?php

include('../../pages/utils.php');
checkSessionAdminElseLogin('../..');

include('../../../database.php');

if(isset($_GET['name'])){
    $name = $_GET['name'];
    $db = getDatabase();
    $sql = 'SELECT * FROM user WHERE pseudo LIKE ? OR mail LIKE ? OR firstName LIKE ? AND banned=0';

    /**
     * Le mot clé LIKE permet de filtrer en valeur qui match une partie d'un mot
     * Il faut spécifier une chose
     * TEXT%  -> Matcher toutes les valeurs qui commencent par TEXT
     * %TEXT  -> Matcher toutes les valeurs qui terminent par TEXT
     * %TEXT% -> Matcher toutes les valeurs qui contient par TEXT
     */

    $stmt = $db->prepare($sql);
    $success = $stmt->execute(['%'.$name.'%', '%'.$name.'%', '%'.$name.'%']);

    if($success){
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);



        foreach ($users as $i => $user){
            echo sprintf("
            <tr>
                <th scope='row'>%d</th>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td class='d-flex justify-content-end'>
                    <button class='btn btn-secondary btn-sm' onclick='location.href=\"../manageUser.php?user=%s\"'>manage profile</button>
                </td>
            </tr>
            ", $i + 1, $user['pseudo'], $user['mail'], $user['firstName'], $user['lastName'], $user['pseudo']);
        }
    }

}