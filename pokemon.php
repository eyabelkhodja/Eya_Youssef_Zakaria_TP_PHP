<?php
    class Pokemon {
        private $nom;
        private $hp;
        private $url;
        private $attackPokemon;
    
        public function __construct($nom, $hp, $url, $ap) {
            $this->nom = $nom;
            $this->hp = $hp;
            $this->url = $url;
            $this->attackPokemon = $ap;
        }
    
        public function getNom() {
            return $this->nom;
        }
    
        public function setNom($nom) {
            $this->nom = $nom;
        }
    
        public function getHp() {
            return $this->hp;
        }
    
        public function setHp($hp) {
            $this->hp = $hp;
        }
    
        public function getUrl() {
            return $this->url;
        }
    
        public function setUrl($url) {
            $this->url = $url;
        }
    
        public function getAttackPokemon() {
            return $this->attackPokemon;
        }
    
        public function setAttackPokemon($attackPokemon) {
            $this->attackPokemon = $attackPokemon;
        }
        public function isdead() {
            return $this->hp <= 0;
        }
        public function attack($p) {
            $attack = rand($this->attackPokemon->getAttackMinimal(), $this->attackPokemon->getAttackMaximal());
            $attack = rand(1, 100) <= $this->attackPokemon->getProbabiliteSpecialAttack() ? $attack*=$this->attackPokemon->getSpecialAttack() : $attack;
            $remove=$p->getHp() - $attack;
            $p->setHp($remove>0?$remove:0);
            return $attack;
        }
        public function whoAmI() {
            $nom = $this->nom;
            $hp = $this->hp;
            $url = $this->url;
            $attackMinimal = $this->attackPokemon->getAttackMinimal();
            $attackMaximal = $this->attackPokemon->getAttackMaximal();
            $specialAttack = $this->attackPokemon->getSpecialAttack();
            $probabiliteSpecialAttack = $this->attackPokemon->getProbabiliteSpecialAttack();
        
            include 'template.php';
        }
        
        
    }
    
    class AttackPokemon {
        private $attackMinimal;
        private $attackMaximal;
        private $specialAttack;
        private $probabiliteSpecialAttack;
    
        public function __construct($attackMinimal, $attackMaximal, $specialAttack, $probabiliteSpecialAttack) {
            $this->attackMinimal = $attackMinimal;
            $this->attackMaximal = $attackMaximal;
            $this->specialAttack = $specialAttack;
            $this->probabiliteSpecialAttack = $probabiliteSpecialAttack;
        }
    
        public function getAttackMinimal() {
            return $this->attackMinimal;
        }
    
        public function setAttackMinimal($attackMinimal) {
            $this->attackMinimal = $attackMinimal;
        }
    
        public function getAttackMaximal() {
            return $this->attackMaximal;
        }
    
        public function setAttackMaximal($attackMaximal) {
            $this->attackMaximal = $attackMaximal;
        }
    
        public function getSpecialAttack() {
            return $this->specialAttack;
        }
    
        public function setSpecialAttack($specialAttack) {
            $this->specialAttack = $specialAttack;
        }
    
        public function getProbabiliteSpecialAttack() {
            return $this->probabiliteSpecialAttack;
        }
    
        public function setProbabiliteSpecialAttack($probabiliteSpecialAttack) {
            $this->probabiliteSpecialAttack = $probabiliteSpecialAttack;
        }
    }




?>