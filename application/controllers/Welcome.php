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

	// return the # of scores we have on file.
	// 
	// an example of a utility method inside a normal controller.
	// this method returns an HTML fragment only.
	// 
	// Note: obscurely named method, only visible if the user examines our 
	// javsscript source in their browser
	function reallylongbuthiddenreference() {
		$xml = simplexml_load_file(DATAPATH.'results.xml');
		$count = $xml->count();
		// invoke the parser without third parameter, so results returned to browser
		$this->parser->parse('show_scores',array('count'=>$count));
	}
}
