<?php
//Classe que inicia a aplicação
class Application {

    public function __construct() {
        $this->getLogin();
    }
    private function getLogin() {
        header("location:View/login.php");
    }
}

//Faz o controle das páginas.
class Controller {

    private $id;

    //Verifica as informações enviadas via get e redireciona o usuário para as devidas páginas.
    public function __construct() {
        if (isset($_POST['pass']) && isset($_POST['username'])) {
            $this->getFromLogin();
        }

        if (isset($_GET['validation'])) {
            if ($_GET['validation']) {
                $this->id = $_GET['id'];
                $this->getHomePage();
            } 
            else {
                $this->getLoginError();
            }
        }
    }
    
    //Redireciona os dados do login para a autenticação no Model.
    private function getFromLogin() {

        $user = $_POST['username'];
        $password = $_POST['pass'];

        header("location:../Model/autentication.php?user=$user&password=$password");
    }
    
    //Redireciona para a Home Page.
    private function getHomePage() {
        header("location:../View/homepage.php?id=$this->id");
    }
    
    //Retorna ao login com mensagem de erro.
    private function getLoginError(){
        header("location:../View/login.php?validation=false");
    }
}

class Model {

    private $database;
    private $user;
    private $password;
    private $table;

    public function __construct($database, $table, $user, $password) {

        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->table = $table;

    }

    public function getValidation() {
        $data = $this->getData();
        $confirmed = false;
        foreach ($data as $key) {
            if ($this->user == $key['username'] && $this->password == $key['password']) {
                $confirmed = true;
            }
        }
        return $confirmed;
    }

    private function getData() {
        $cmd = "SELECT * FROM $this->table";
        $cmd = $this->database->query($cmd);

        return $cmd;
    }

    public function getId() {
        foreach ($this->getData() as $key) {
            if ($key['username'] == $this->user) {
                $id = $key['id'];
            }
        }
        return $id;
    }
}

class View {
    private $validscript =
    "
    <script>
        let error = document.getElementById('error');
        error.style.display = 'block';
        error.style.marginLeft += 15+'px';
    </script>
    ";

    private $img_f =
    "<img style='width:300px;height:300px'src='../Media/girl.png'>";

    private $img_m =
    "<img style='width:300px;height:300px;' class='user-img' src='../Media/boy.png'>";

    public function __construct() {
        if (isset($_GET['validation'])) {
            echo $this->validscript;
        }
    }

    public function getDatabaseInfo($database, $table, $id) {

        $cmd = $database->query("SELECT * FROM cadastros WHERE id=$id");

        foreach ($cmd as $key) {
            $information = $key;
        }

        return $information;

    }

    public function setImg($gender) {
        switch ($gender) {
            case 'M':
                echo $this->img_m;
                break;

            case 'F':
                echo $this->img_f;
                break;
        }
    }

    public function setWelcomeMessage($gender) {
        switch ($gender) {
            case 'M':
                echo "<h2>Seja Bem Vindo!</h2>";
                break;

            case 'F':
                echo "<h2>Seja Bem Vinda!</h2>";
                break;
        }
    }
}
?>