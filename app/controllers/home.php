<?php

	final class home extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mHome($params);
			$this->view=new vHome;
		}
        /**
            Funcion que muestra el tiempo que se ha tardado en cargar la pagina   
        **/
		function home(){
			//we can comprove that we pass the parameters
			//var_dump($this->params);
			//echo "   Action";
			//Accedim a valors de configuració
			Coder::code_var($this->model->get_out());
			echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
		}
		/**
            Funcion que hace el login de un usuario
        **/
		function login(){
			$nom = $_POST['email'];
			echo $nom;
            echo '<br>';
            $pass=$_POST['password'];
            echo $pass;
            $model = new DB;
            $conexion = $model->singleton();
            //Si encuentra algun usuario que tenga el nombre y el password indicados el login sera correcto
            $sql = 'SELECT * FROM usuaris WHERE email=:email AND password=:pass';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':email', $nom, PDO::PARAM_STR);
            $consulta->bindParam(':pass', $pass, PDO::PARAM_STR);
            echo "consulta:".$consulta->execute().";";
            //Devuelve el numero de filas que ha encontrado si devuelve 1 significa que el login ha sido correcto
  
            $total = $consulta->rowCount();          
            echo '<br>';
            echo $total;
            
            if($total == 0){
                $this->mensaje = 'Error';
            }
            else{
                
                $fila = $consulta->fetch();
                $_SESSION['login'] = true;
                $_SESSION['nom'] = $fila['nom'];
                $_SESSION['password'] = $fila['password'];
                $_SESSION['idrol'] = $fila['idrol'];
                
                if($_SESSION['idrol'] == 1){
                    header('Location: '.APP_W.'paneladmin');    //Dependiendo del rol del usuario entraremos en un panel o otro
                }else{
                   header('Location: '.APP_W.'panel'); 
                }
//                echo '<script>';
//                    echo 'window.location.replace("panel");';
//                    
//                echo '</script>';
            }
		}
	}