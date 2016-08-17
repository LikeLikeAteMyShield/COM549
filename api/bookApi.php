<?php 

$bookxml = simplexml_load_file("xml/books.xml");

function getAllBooks() {
    return $GLOBALS['bookxml'];
}

?>