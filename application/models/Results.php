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
		$this->xml = simplexml_load_file(DATAPATH . 'results.xml');
	}

	// return games after a specficied data
	public function since($lastdate='20150831')
	{
		$answer = array();
		foreach ($this->xml->children() as $game)
		{
			if ($lastdate < (string)$game['date'])
				$answer[] = $game;
		}
		return $answer;
	}

}
