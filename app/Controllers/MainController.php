<?php

class MainController {

    public function show($template,$viewData) { //verfifier les wchemins fctnent ?
        require '__DIR__'.'/Views/header.tpl.php' ;
        require '__DIR__'."/Views/$template.tpl.php" ;
        require '__DIR__'.'/Views/footer.tpl.php' ;
    } 

    public function home($params) {  //meme soi on t=utilse  pas parmas on le met en arg
        $this->show('home') ;

    }

    public function informations($params) {  //meme soi on t=utilse  pas parmas on le met en arg
        $this->show('informations') ;

    }
}