<!DOCTYPE html>

<?php
include "../Classes/System.php";

$pdo = new PDO("mysql:host=localhost;dbname=login", "lavi", "");

$view = new View();
$user = $view->getDatabaseInfo($pdo, 'cadastros', $_GET['id']);
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../Styles/homepage-style.css" rel="stylesheet">
    <title></title>
</head>
<body>
    <div class="title">
        <h1>Projeto - Sistema de Login</h1>
    </div>
    <div class="card-wrap">
        <div class="card-header four">
            <?php
            $view->setImg($user['gênero']);
            ?>
        </div>
        <div class="card-content">
            <h1 class="card-title"><?php echo "Olá".",".$user['name']."!" ?></h1>
            <p class="card-text">
                Nós da empresa Anxious Native,
                oferecemos oportunidades incríveis 
                para nossos usuários!<br>Vamos Iniciar nossa jornada.
            </p>
            <button class="card-btn four">Iniciar </button>
        </div>
    </div>
    <br>
    <div class="container">
        <p>Tecnologias Usadas:</p>
        <div class="img-container">
            <img src="../Media/mysql.png">
            <img src="../Media/php.png">
            <img src="../Media/web3.png">
        </div>
    </div>
</body>
</html>