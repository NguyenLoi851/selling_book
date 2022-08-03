<?php
require_once ROOT . DS . 'mvc' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'mvc' . DS . 'controllers' . DS . 'DefaultController.php';

class FunctionController extends DefaultController implements Controller{
    public function __render(){
        $new_route = explode("/", $this->getRoute());
        require_once ROOT . DS . 'mvc' . DS . 'views' . DS . $new_route[count($new_route) - 1] ;
    }
}