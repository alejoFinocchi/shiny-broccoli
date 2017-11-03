<?php

class Login extends TwigView {
    
    public function loginShow() {
        
        echo self::getTwig()->render('login.html.twig');
        
        
    }
    
}
