<?php

namespace systemx\systemx;
/**
 * 
 */
use systemx\systemx\controller;
use systemx\systemx\exception\NotFoundException;
class Router{
	
	public Request $request;
	public Response $response;
    protected array $routes =[];

public function __construct(Request $request, Response $response){
	$this->request = $request;
	$this->response = $response;
}

	public function get($path, $callback)
	{
        $this->routes['get'][$path]= $callback;
	}
	
	
	public function post($path, $callback)
	{
        $this->routes['post'][$path] = $callback;
	}
	 
	public function resolve()
	{
				
		$path = $this->request->getPath(); 			
		$method = $this->request->method();
		$url = $this->request->getUrl();
		$callback = $this->routes[$method][$url] ?? false;		
		if ($callback === false) {
				       	
			 throw new NotFoundException();	 
         }
          
       if(is_string($callback)){
		 return Application::$app->view->renderView($callback);  
	   }
	   if (is_array($callback)){
		   
		   $controller  = new $callback[0]();
		   Application::$app->controller = $controller;
		    $controller ->action = $callback[1];
			 $callback[0] = $controller;
			foreach($controller->getMiddlewares() as $middleware){
				$middleware->execute();
			}
		  
	   }
     return call_user_func($callback, $this->request, $this->response);
	}
	
	
	
	
	
	
	
}
	