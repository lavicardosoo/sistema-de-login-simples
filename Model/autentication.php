<?php

include "../Classes/System.php";

try{
    $pdo = new PDO("mysql:host=localhost;dbname=login","lavi", "");
    
    $model = new Model($pdo, 'cadastros', $_GET['user'], $_GET['password']);
    
    $invalid = false;
    
    if($model->getValidation()){
        $id = $model->getId();
        header("location:../Control/controller.php?validation=true&id=$id");
    }
    else{
        header("location:../Control/controller.php?validation=$invalid");
    }
} 
catch(PDOException $error){
    echo "Erro de conexão:"."<br>".$error->getMessage();
}
?>
