<?php

require 'database.php';
class utilisateur{
    private $id;
    private $username;
    private $email;
    private $role;
    public function __construct ( $id, $username, $email, $role ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }
    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){
        return $this->role;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setRole($role){
        $this->role = $role;
    }
}

class etudiant {
    private $id;
    private $name;
    private $birthday;
    private $image;
    private $section;
    public function __construct($id, $name, $birthday, $image, $section) {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->image = $image;
        $this->section = $section;
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getBirthday() {
        return $this->birthday;
    }
    public function getImage() {
        return $this->image;
    }
    public function getSection() {
        return $this->section;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }
    public function setImage($image) {
        $this->image = $image;
    }
    public function setSection($section) {
        $this->section = $section;
    }
}

class section{
    private $id;
    private $designation;
    private $description;
    public function __construct($id, $designation, $description) {
        $this->id = $id;
        $this->designation = $designation;
        $this->description = $description;
    }
    public function getId() {
        return $this->id;
    }
    public function getDesignation() {
        return $this->designation;
    }
    public function getDescription() {
        return $this->description;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setDesignation($designation) {
        $this->designation = $designation;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
}
abstract class Repository {
    protected $data = [];
    protected $filename;

    public function __construct($filename) {
        $this->filename = $filename;
        if (file_exists($filename)) {
            $this->data = json_decode(file_get_contents($filename), true);
        }
    }

    public function findAll() {
        return $this->data;
    }

    public function findById($id) {
        foreach ($this->data as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function create($record) {
        $record['id'] = $this->generateId();
        $this->data[] = $record;
        $this->save();
        return $record;
    }

    public function delete($id) {
        foreach ($this->data as $index => $item) {
            if ($item['id'] == $id) {
                unset($this->data[$index]);
                $this->data = array_values($this->data); // réindexation
                $this->save();
                return true;
            }
        }
        return false;
    }

    protected function save() {
        file_put_contents($this->filename, json_encode($this->data, JSON_PRETTY_PRINT));
    }

    protected function generateId() {
        $ids = array_column($this->data, 'id');
        return empty($ids) ? 1 : max($ids) + 1;
    }
}

?>