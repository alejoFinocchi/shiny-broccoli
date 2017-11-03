<?php

class Denuncias extends TwigView {
    
    public function show($params = array()) {
        
        echo self::getTwig()->render('denunciaForm.html.twig',$params);        
    }
    public function showDenuncias($denuncias) {        
        echo self::getTwig()->render('denunciaList.html.twig',array('denuncias' => $denuncias));       
    }
    
    
}
