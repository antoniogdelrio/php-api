<?php

    abstract class Repository {

        private $db;

        function __construct($db){
            $this->db = $db;
        }

        abstract function getAll();
        abstract function getOne($id);
        abstract function insert($post);
        abstract function delete($id);
        abstract function update($id, $post);
    }