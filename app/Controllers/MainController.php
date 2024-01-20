<?php

namespace recettes\Controllers ;
use recettes\Models\Recipe ;

class MainController extends CoreController {



    public function home($params) {  //meme si on t=utilse  pas params on le met en arg
      
           
        $this->show('home'); 

    }

    public function informations($params) {  //meme soi on t=utilse  pas parmas on le met en arg
        $this->show('informations') ;

    }

    
}