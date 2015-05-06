<?php
  /**
      Panel de usuario no administrador
  **/
	final class Panel extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mPanel;
			$this->view=new vPanel;
		}
		public $insertInto;
 		public $insertColumns;
		public $insertValues;
		function crear(){
			$model = new DB;
            $conexion = $model->singleton();

            $insertInto = $this->insertInto;
	 		$insertColumns = $this->insertColumns;
			$insertValues = $this->insertValues;

			$sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
			$consulta = $conexion->prepare($sql);

			if (!$consulta) {
				$this->mensaje = "Error al crear registro"; 
			}else{
				$consulta->execute();
				$this->mensaje = "Registro creado correctamente";
			}
		}
		/*function linia_nueva(){
			if (isset($_POST["create"])) {
    	  $mensaje = "";
          $nombre = htmlspecialchars($_POST['nombre']);
          $apellidos = htmlspecialchars($_POST['cognoms']);
          $email = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);

          if ($nombre == '') {
            $mensaje = 'El nombre tiene que contener algun caracter.';
          }elseif (strlen($nombre) > 30) {
            $mensaje = 'Nombre muy largo.';
          }

          if ($apellidos == '') {
            $mensaje = 'Los apellidos tienen que contener algun caracter.';
          }elseif (strlen($nombre) > 50) {
            $mensaje = 'Apellidos muy largos.';
          }
          
          if ($email == '') {
            $mensaje = 'El email tiene que contener algun caracter.';
          }elseif (strlen($nombre) > 30) {
            $mensaje = 'Email muy largo.';
          }

          if ($password == '') {
            $mensaje = 'El password tiene que contener algun caracter.';
          }elseif (strlen($nombre) > 30) {
            $mensaje = 'password muy largo.';
          }
      }else{
        $model = new crear;
        $model->insertInto = 'usuaris';
        $model->insertColumns = 'nombre, apellidos, email, password';
        $model->insertValues = "'$nombre', '$apellidos', '$email', '$password'";
        $model->crear();
        $mensaje = $model->mensaje;
      }	
		}
		function leer(){
			$model = new DB;
            $conexion = $model->singleton();
            $select = $this->select;
            $from = $this->from;
            $condition = $this->condition;

            if($condition != ''){
            	$condition = " WHERE " . $condition;
            }

            $sql = "SELECT $select FROM $from $condition";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();;
			
			while ($fila = $consulta->fetch()) {
				$this->rows[] = $filas;
			}
			
		}
	*/
   function modificar(){
         
            $nusuario=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user=$this->model->modificar($nombre,$nusuario,$email,$password);
         echo $user;
         if ($user==1){
               // cap a la pàgina principal
               header('Location:'.APP_W.'correcto');
               //echo $email;
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'error');
             }

        }
      }
