<?php
	final class Correcto extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mCorrecto;
			$this->view=new vCorrecto;
		}
		function home(){
			
			
			
		}
	}