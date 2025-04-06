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
?>