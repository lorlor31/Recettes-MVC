<?php
namespace recettes\Controllers ;
class ErrorController extends CoreController {


    function error404() {
        $this->show('error') ;
    }

    
}

