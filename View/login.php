<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Styles/login-style.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Login
        </div>
        <form action="../Control/controller.php" method="POST">
            <div class="field">
                <input type="text" name="username" required>
                <label>Usuário</label>
            </div>
            <div class="field">
                <input name="pass" type="password" required>
                <label>Senha</label>
            </div>
            <div class="field" id="error" style="display:none;">
                <span style="color:red;">Usuário ou senha inválidos</span>
            </div>
            <div class="field">
                <input name="login" type="submit" value="Entrar">
            </div>
        </form>
    </div>
    
    <?php
    include '../Classes/System.php';
    $view = new View()
    ?>
</body>
</html>