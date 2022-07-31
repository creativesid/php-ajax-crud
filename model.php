<?php

class Model{
    private $dsn = 'mysql:host=localhost;dbname=duplex';
    private $user = 'root';
    private $password = '';
    public $conn;

    public function __construct(){
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            // echo 'connected';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // insert data
    public function insert($title,$author,$date){
        $query = 'INSERT INTO tutorials_tbl(tutorial_title,tutorial_author,submission_date) values(:tutorial_title,:tutorial_author,:submission_date)';

        $statement = $this->conn->prepare($query);
        $statement->execute(['tutorial_title'=>$title, 'tutorial_author'=>$author, 'submission_date'=>$date]);

        return true;
    }

    // get all data
    public function getAll(){
        $data = array();
        $query = 'SELECT * FROM tutorials_tbl';
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // foreach ($result as $row) {
        //     $data[] = $row;
        // }

        return $result;
    }

    // get single data
    public function get($id){
        $query = 'SELECT * FROM tutorials_tbl WHERE tutorial_id = :tutorial_id';
        $statement = $this->conn->prepare($query);
        $statement->execute(['tutorial_id'=>$id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // update data
    public function update($id,$title,$author,$date){
        $query = 'UPDATE tutorials_tbl SET tutorial_title=:tutorial_title,tutorial_author=:tutorial_author,submission_date=:submission_date WHERE tutorial_id=:tutorial_id';
        $statement = $this->conn->prepare($query);
        $statement->execute(['tutorial_title'=>$title, 'tutorial_author'=>$author, 'submission_date'=>$date,'tutorial_id'=>$id]);

        return true;
    }

    // delete data
    public function delete($id){
        $query = 'DELETE FROM tutorials_tbl WHERE tutorial_id=:tutorial_id';
        $statement = $this->conn->prepare($query);
        $statement->execute(['tutorial_id'=>$id]);

        return true;
    }

}

$obj = new Model();
?>