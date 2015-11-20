<?php

/**
 * Process an NFL standings page (CSV), producing standings.xml
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Standings extends Application {

    function __construct() {
        parent::__construct();
    }

    //  return the newest standings XML
    function index() {
		// identify the newest file
		// return it
    }

	// convert uploaded standings CSV files to XML ones
	function convert() {
		// identify CSV files
        $this->load->helper('directory');
        $candidates = directory_map(DATAPATH);
        sort($candidates);
        foreach ($candidates as $file) {
            if (substr_compare($file, CSVSUFFIX, strlen($file) - strlen(CSVSUFFIX), strlen(CSVSUFFIX)) === 0) {
                // trim the suffix
                $filename = substr($file, 0, -4);
				echo $filename . BR;
			}
        }
	}

}
