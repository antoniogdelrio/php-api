<?php

    include 'Repository.php';

    class MysqlRepository extends Repository{

        function getAll(){
            $sql = 'SELECT * from posts';

            $stmt = $db->query($sql);
            $data = $stmt->fetchAll();

            echo 'Dados coletados!';

            return $data;
        }

        function getOne($id){
            $sql = 'SELECT * from posts WHERE id = :id';
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);
            $data = $stmt->fetchAll();

            return $data;
        }

        function insert($post){
            $postTitle = $post->title;
            $postAuthor = $post->author;
            $postBody = $post->body;

            $sql = "INSERT into posts (title, author, body) VALUES (:postTitle, :postAuthor, :postBody)";

            $stmt = $db-prepare($sql);
            $stmt->execute(['postTitle' => $postTitle, 'postAuthor' => $postAuthor, 'postBody' => $postBody]);

            $data = $stmt->fetchAll();

            return $data;
        }

        function delete($id){
            $sql = "DELETE from posts WHERE id=:id";

            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);

        }

        function update($id, $post){

            $newPostTitle = $post->title;
            $newPostBody = $post->body;
            $newPostAuthor = $post->author;

            $sql = 'UPDATE posts SET ';
            $arrayToExecute = array();


            if(isset($newPostTitle)){
                $sql .= ' title = :newPostTitle';
                $arrayToExecute['newPostTitle'] = $newPostTitle;
            }
            if(isset($newPostBody)){
                $sql .= ' body = :newPostBody';
                $arrayToExecute['newPostBody'] = $newPostBody;
            }
            if(isset($newPostAuthor)){
                $sql .= ' author = :newPostAuthor';
                $arrayToExecute['newPostBody'] = $newPostAuthor;
            }

            if($sql == 'UPDATE posts SET '){
                return;
            }

            $stmt = $db->prepare($sql);
            $stmt->execute($arrayToExecute);
        }
    }

