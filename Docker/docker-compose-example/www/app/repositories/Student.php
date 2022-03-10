<?php
require 'app/models/Student.php';

class StudentRepository
{
    public static function getAll()
    {
        try {
            $conn = Connection::getConnect();
            $query = $conn->query('select * from Student');
            $data = $query->fetchAll(PDO::FETCH_CLASS, 'StudentModel');

            return $data;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public static function getStudentWithId($id = '')
    {
        try {
            $conn = Connection::getConnect();
            $statement = $conn->prepare('SELECT * FROM Student WHERE id = ? LIMIT 1');
            $statement->execute([$id]);
            $statement->setFetchMode(PDO::FETCH_CLASS, 'StudentModel');
            $data = $statement->fetch();
            return $data;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
