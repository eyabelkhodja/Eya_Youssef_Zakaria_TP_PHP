<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<br>
    <?php
    class Etudiant
    {
        public $name;
        public $notes;
        public function __construct($name,$notes)
        {
            $this->name=$name;
            $this->notes=$notes;
        }
        public function afficher(){
            for ($i= 0;$i<count($this->notes);$i++)
            {
                if ($this->notes[$i]<10)
                echo"<li class='list-group-item list-group-item-danger'>".$this->notes[$i]."</li>";
                if ($this->notes[$i]==10)
                echo "<li class='list-group-item list-group-item-warning'>".$this->notes[$i]."</li>";
                if ($this->notes[$i]> 10)
                echo "<li class='list-group-item list-group-item-success'>".$this->notes[$i]."</li>";
            }
        }
        public function calculmoyenne(){
            $s=0;
            for ($i= 0;$i<count($this->notes);$i++)
            $s+=$this->notes[$i];
        return $s/count($this->notes);
        }
        public function validation(){
            $m=$this->calculmoyenne();
            if($m>= 10){
                echo("Admis");
            }else{
                echo("Non Admis");
            }
        }


    }
    $Aymen= new Etudiant("Aymen",[11,13,18,7,10,13,2,5,1]);
    $Skander= new Etudiant("Skander",[15,9,8,16]);
    $Etudiant=[$Aymen,$Skander];
    ?>
    <br>
    <br>
    <div class="container text-center">
  <div class="row">
    <?php
    for ($i= 0;$i<count($Etudiant);$i++)
    {
        echo "<div class='col'>
        <ul class='list-group'>
        <li class='list-group-item list-group-item-secondary'>".$Etudiant[$i]->name."</li>";
        $Etudiant[$i]->afficher();
        echo"<li class='list-group-item list-group-item-primary'>Votre Moyenne Est ".$Aymen->calculmoyenne()."</li></ul></div>"; 
        
    }
    ?>
   
    
  </div>
</div>
    
</body>
</html>