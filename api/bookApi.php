<?php 

$userxml = simplexml_load_file("xml/users.xml");
$bookxml = simplexml_load_file("xml/books.xml");

function getAllBooks() {
    return $GLOBALS['bookxml'];
}

function getBooksForUser($name) {

    $user = getUser($name);
    $results = [];

    foreach($GLOBALS['bookxml'] as $book) {
        foreach($user->books->book as $userBook) {
            if (strcmp($userBook, $book['id']) == 0) {
                array_push($results, $book);
            }
        }
    }
    return $results;
}

function getUser($name) {

    $result = null;

    foreach ($GLOBALS['userxml'] as $user) {
        if ($user->name == $name) {
            $result = $user;
        }
    }

    return $result;
}

?>