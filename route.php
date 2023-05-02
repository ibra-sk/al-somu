<?php

class Route {
	
	private $_uri = array();
	private $_method = array();
	private $_action = array();
	private $_params = array();
	
	public function add($uri, $method, $action = null){
		$this->_uri[] 	 = '/' . trim(str_replace('?', '', $uri), '/');
		$this->_method[] = $method;
		$this->_action[] = ($action != null) ? $action : 'index';
		$this->_params[] = (str_contains($uri, '?')) ? true : false;
	}
	
	public function submit(){
		$bool = false;
		$uriGetParam = isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';
		foreach($this->_uri as $key => $value){
			if(preg_match("#^$value$#", $uriGetParam) && !($this->_params[$key])){
				$useMethod = $this->_method[$key];
				$useAction = $this->_action[$key];
				//echo $useMethod . ' - ' . $useAction;
				$bool = true;
				$page = new $useMethod();
				$page->$useAction();
				exit();
			}
			if(preg_match("#^$value(.+)$#", $uriGetParam) && $this->_params[$key]){
				$useMethod = $this->_method[$key];
				$useAction = $this->_action[$key];
				$useParams = substr($_GET['uri'], strrpos($_GET['uri'], '/') + 1);
				//echo $useMethod . ' - ' . $useAction;
				$bool = true;
				$page = new $useMethod();
				$page->$useAction($useParams);
				exit();
			}
		}
		//Handle Unknown or Bad URL
		if(!$bool){
			$page = new ErrHandler();
			$page->PageNotFound();
		}
	}
	
}



?>