<?php

namespace systemx\systemx;
/**
 * 
 */

class View{
	public string $title='';
	
	public function renderView($view, $params=[]){
		$viewContent = $this->renderOnlyView($view, $params);
		$layoutContent = $this->layoutContent();
		
		return str_replace('{{content}}', $viewContent, $layoutContent);
	include_once Application::$ROOT_DIR."/views/$view.php";
	}
	
	protected function layoutContent(){
		$layout = Application::$app->layout;
		if(Application::$app->controller){
		$layout = Application::$app->controller->layout;
		}
		ob_start();
		include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
		return ob_get_clean();
	}
	protected function loadCss($css){
		if(file_exists(Application::$ROOT_DIR."/views/layouts/css/$css.php")){
			return $link = Application::$ROOT_DIR."/views/layouts/$css.php";
		}
		
		
	}
	
	
	protected function renderOnlyView($view, $params){
		
		foreach ($params as $key => $value){
			$$key =$value;
		}
		ob_start();
		include_once Application::$ROOT_DIR."/views/$view.php";
		return ob_get_clean();
	}
	
	
	public function renderContent($viewContent){
		$layoutContent = $this->layoutContent();		
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}
	
	}