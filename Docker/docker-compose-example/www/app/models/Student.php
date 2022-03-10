<?php
class StudentModel extends Model
{
    private $id;
    private $avg;
    private $name;
    private $phone;
    private $grade;
    private $email;
    private $birthday;

    public function __construct()
    {
        $this->tableName = 'Student';
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
