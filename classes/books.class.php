<?php
require_once "database.class.php";
    class Books {
        private $conn;

        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }
        function getData() {
            $sql = "SELECT * FROM books";
            $query = $this->conn->prepare($sql);
            if($query->execute()){
                $data = $query->fetchAll();
            }
            return $data;
        }
        function setData($bookTitle, $author, $genre, $publisher, $pubDate, $edition, $numCopies, $format, $ageGroup, $rating){
            $sql = "INSERT INTO books(bookTitle, author, genre, publisher, pubDate, edition, numCopies, format, ageGroup, rating) VALUES (:bookTitle, :author, :genre, :publisher, :pubDate, :edition, :numCopies, :format, :ageGroup, :rating);";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':bookTitle', $bookTitle);
            $query->bindParam(':author', $author);
            $query->bindParam(':genre', $genre);
            $query->bindParam(':publisher', $publisher);
            $query->bindParam(':pubDate', $pubDate);
            $query->bindParam(':edition', $edition);
            $query->bindParam(':numCopies', $numCopies);
            $query->bindParam(':format', $format);
            $query->bindParam(':ageGroup', $ageGroup);
            $query->bindParam(':rating' , $rating);

            if($query->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>