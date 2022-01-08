<?php

namespace systemx\mvc;
/**
 * 
 */
 use systemx\mvc\Application;
 use systemx\mvc\Router;
  use systemx\mvc\middlewares\BaseMiddleware;
  use systemx\mvc\middlewares\AuthMiddleware;
class Controller
{
	public string $layout = 'main';
	public string $action = '';
	protected array $middlewares = [];
	
	public  function setLayout($layout)
	{
		
	       $this->layout = $layout; 
		
	}
	
	public  function render($view, $params = [])
	{
		
	return Application::$app->view->renderView($view, $params);
		
	}
	public  function registerMiddleWare(BaseMiddleware $middleware)
	{
		$this->middlewares[] = $middleware;
	}
	public  function getMiddlewares():array
	{
		return $this->middlewares;
	}
	public  function setMiddlewares(BaseMiddleware $middleware)
	{
		$this->middlewares[] = $middleware;
	}
}