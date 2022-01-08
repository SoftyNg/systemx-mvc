<?php

namespace systemx\mvc\form;
/**
 * 
 */
use systemx\mvc\Model;
abstract class BaseField
{	
    public Model $model;
	public String $attribute;
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_EMAIL = 'email';
  public function  __construct(Model $model, String $attribute){
		  $this->type = self::TYPE_TEXT;
		  $this->model = $model;
		  $this->attribute = $attribute;
	  }
	  
    abstract public function renderInput(): string;
	
	  public function __toString(){
		  return sprintf(
		  '<div class="form-group">
    <label >%s</label>
    %s
	<div class="invalid-feedback">
	      %s
	</div>    
  </div>
        ',$this->model->getlabel($this->attribute),
		  $this->renderInput(),
		  $this->model->getFirstError($this->attribute)
		  );
	  }
	 
     
	 
}