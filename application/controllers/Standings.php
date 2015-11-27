<?php

/**
 * Provide a service - return the most recent NFL standings (XML)
 * 
 * Usage:	xxx/standings
 * Returns:	the newest standings, as an XML document
 * 
 * Note:	XML documents can be retrieved directly, eg. xxx/data/blah.xml
 * 			The smae would apply to the DTD ... xxx/data/standings.dtd
 *
 * Note:	This is an example of a utility controller, meant to return an XML
 * 			document or error message, and not a complete HTML page.
 * ------------------------------------------------------------------------
 */
class Standings extends CI_Controller {

	var $highest = 0; // latest date found
	var $theone = null; // which document to return

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('directory', 'file', 'html'));
	}

	//  return the newest standings XML
	function index()
	{
		$this->_inspect();
		// return it
		if (!empty($this->theone))
		{
			echo read_file(DATAPATH . $this->theone);
		} else
			echo 'No suitable data found!';
	}

	//  return a fragment with the latest date
	function latest()
	{
		$this->_inspect();
		$xml = simplexml_load_file(DATAPATH . $this->theone);
		$thedate = (string) $xml['asof'];
		// invoke the parser without third parameter, so results returned to browser
		$this->parser->parse('show_latest', array('asof' => $thedate));
	}

	// protected function to dig up details
	//	yes, the code is sloppy ... it would tighten up with refactoring  :-/
	function _inspect()
	{
		// identify the newest file
		$candidates = directory_map(DATAPATH);
		sort($candidates);
		foreach ($candidates as $file)
		{
			// looking for XML files
			if (substr_compare($file, XMLSUFFIX, strlen($file) - strlen(XMLSUFFIX), strlen(XMLSUFFIX)) === 0)
			{
				// that start with "standings-"
				if (substr_compare($file, 'standings-', 0, 10, true) === 0)
				{
					$filedate = substr($file, -12); // grab the last 10 characters
					$filedate = substr($filedate, 0, -4); // strip the extension
					if ($filedate > $this->highest)
					{
						$this->highest = $filedate;
						$this->theone = $file;
					}
				}
			}
		}
	}

}
