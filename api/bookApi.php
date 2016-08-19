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

function getBookById($id) {

    $result = null;

    foreach ($GLOBALS['bookxml'] as $book) {
        if (strcmp($id, $book['id']) == 0) {
            $result = $book;
        }
    }

    return $result;
}

function getAllGenres() {

    $results = [];

    foreach ($GLOBALS['bookxml'] as $book) {
        $genre = $book->genre;
        
        if (!in_array($genre, $results)) {
            array_push($results, $genre);
        }
    }

    return array_unique($results);
}

function filterByGenre($genre) {

    $results = [];

    foreach ($GLOBALS['bookxml'] as $book) {
        if (strcmp($book->genre, $genre) == 0) {
            array_push($results, $book);
        }
    }

    return $results;
}

function checkIfBookIsInUserLibrary($book) {

    $result = false;
    $user = getUser($_SESSION['name']);
    foreach ($user->books->book as $userBook) {
        if (strcmp($userBook, $book['id']) == 0){
            $result = true;
        }
    }

    return $result;
}

function addBookToLibrary($book) {

    $user = getUser($_SESSION['name']);
    $userBooks = $user->books;

    $userBooks->addChild('book', $book['id']);
    $GLOBALS['userxml']->asXml('xml/users.xml');
}

?>