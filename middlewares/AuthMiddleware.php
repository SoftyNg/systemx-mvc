<?php

namespace systemx\systemx\middlewares;
use systemx\systemx\Controller;
use systemx\systemx\Application;
use systemx\systemx\exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware {
	public array $actions = [];
	
	public function __construct(array $actions=[]){
		$this->actions = $actions;
	}
	public function execute(){
		if (Application::isGuest()){
			if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions) )
             throw new ForbiddenException();
		}
		}
	
}