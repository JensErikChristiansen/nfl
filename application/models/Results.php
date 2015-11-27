<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Simple model to extract game results
 *
 * @author jim
 */
class Results extends CI_Model {

	var $xml = null;

	// constructor
	public function __construct()
	{
		parent::__construct();
		$xml = simplexml_load_file(DATAPATH . 'scores.xml');
	}

	// return games after a specficied data
	public function since($lastdate)
	{
		$answer = array();
		foreach ($xml->children() as $game)
		{
			if ($game['date'] > $lastdate)
				$answer[] = $game;
		}
		return $answer;
	}

}
