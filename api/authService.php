<?php 

$userxml = simplexml_load_file("xml/users.xml");

function authenticateUser($email, $password) {

    $username = null;

    foreach ($GLOBALS['userxml'] as $user) {
        $credentialsMatch = (strcmp($email, $user->email) == 0) && (strcmp($password, $user->password) == 0);
        if ($credentialsMatch) {
            $username = (string)$user->name;
        }
    }

    return $username;
}
?>