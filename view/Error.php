<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */


class Error extends TwigView {
    
    public function show($error = array()) {
        echo self::getTwig()->render('error.html.twig',$error);
        
        
    }
    
}