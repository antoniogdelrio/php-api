<?php
    class Post {
        private $title;
        private $body;
        private $author;

        function __construct($title, $body, $author){
            $this->title = $title;  
            $this->body = $body;
            $this->author = $author;  
        }
    }