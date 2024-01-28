<?php
namespace recettes\Controllers ;
use recettes\Models\CoreModel;
class ErrorController extends CoreController {


    function error404() {
        $this->show('error/error') ;
    }

    
}

