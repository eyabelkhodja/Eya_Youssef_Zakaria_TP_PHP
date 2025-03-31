<?php
class Session{
    public function __construct(){
        session_start();}
        public function set($key, $value){
            $_SESSION[$key] = $value;
        }
        public function get($key){
            if (isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else {
                return null;
            }
        }
        public function delete($key){
            unset($_SESSION[$key]);
        }
        public function destroy(){
            session_destroy();
            $_SESSION =[];}
        public function IncrementerVisites(){
            if (!isset($_SESSION["visites"])){
                $_SESSION["visites"] = 1;
            }else {
                $_SESSION["visites"]++;
            }}
        public function getVisites(){
            return $_SESSION["visites"];
        }
}
$Session=new Session();
$Session->IncrementerVisites();
$v=$Session->getVisites();
$msg;
if ($v==1){
    $msg = "Bienvenu à notre plateforme.";
}else{
    $msg = "Merci pour votre fidélité, c'est votre {$v} éme visite.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="alert alert-success" role="alert">
    <?php 
    echo $msg;
    ?>
    </div>
    <form method="post" action="reinitialisation.php">
    <button type="submit" class="btn btn-danger">Réinitialiser la session</button>
    </form>
    </div>

</body>
</html>