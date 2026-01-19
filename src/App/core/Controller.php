<?php 

namespace App\core;

use eftec\bladeone\BladeOne;

class Controller {

    protected BladeOne $blade;

    public function __construct(){

    $view= __DIR__."/../views";
    $cache = sys_get_temp_dir(); 
        
    $this->blade = new BladeOne(
        $view,
        $cache,
        BladeOne::MODE_DEBUG
    );

    }

    protected function view($view,$data=[]){
        echo $this->blade->run($view,$data);
    }
}
