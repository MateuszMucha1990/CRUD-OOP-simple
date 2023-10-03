<?php

class Posts extends Dbh{
    public function getPost(){
        $sql= "SELECT * FROM posts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()){
            return $result;
        }
    }

    public function addPost($title, $body, $author){
       $sql ="INSERT INTO posts(title, body, author) VALUES (?,?,?)";  //? te ele ktore chcemy pobrac?
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$title, $body, $author]);   // title body i author wpisujemy w miejsce znakow ? wyzej

      // header("location: {$_SERVER['HTTP_REFERER']}"); //przekieruje nas po zapisaniu
    }


    public function editPost($id){
        $sql ="SELECT * FROM posts WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($id, $title, $body, $author ){
        $sql ="UPDATE posts SET title=?, body=?, author=? WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$title, $body, $author, $id]);
    }

    public function delPost($id){
        $sql ="DELETE FROM posts WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$id]);
    }
}