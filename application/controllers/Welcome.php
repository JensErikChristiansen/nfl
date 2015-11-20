<?php

/**
 * Our homepage. 
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  Homepage: not the droid they are looking for
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'homepage';
        $this->render();
    }

}
