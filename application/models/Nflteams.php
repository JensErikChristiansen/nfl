<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Simple model to hold team codes for mapping
 *
 * @author jim
 */
class Nflteams extends CI_Model {

	protected $codes = array(
		'ARI Arizona Cardinals',
		'ATL' => 'Atlanta Falcons',
		'BAL' => 'Baltimore Ravens',
		'BUF' => 'Buffalo Bills',
		'CAR' => 'Carolina Panthers',
		'CHI' => 'Chicago Bears',
		'CIN' => 'Cincinnati Bengals',
		'CLE' => 'Cleveland Browns',
		'DAL' => 'Dallas Cowboys',
		'DEN' => 'Denver Broncos',
		'DET' => 'Detroit Lions',
		'GB' => 'Green Bay Packers',
		'HOU' => 'Houston Texans',
		'IND' => 'Indianapolis Colts',
		'JAC' => 'Jacksonville Jaguars',
		'KC' => 'Kansas City Chiefs',
		'MIA' => 'Miami Dolphins',
		'MIN' => 'Minnesota Vikings',
		'NE' => 'New England Patriots',
		'NO' => 'New Orleans Saints',
		'NYG' => 'New York Giants',
		'NYJ' => 'New York Jets',
		'OAK' => 'Oakland Raiders',
		'PHI' => 'Philadelphia Eagles',
		'PIT' => 'Pittsburgh Steelers',
		'SD' => 'San Diego Chargers',
		'SEA' => 'Seattle Seahawks',
		'SF' => 'San Francisco 49ers',
		'STL' => 'St. Louis Rams',
		'TB' => 'Tampa Bay Buccaneers',
		'TEN' => 'Tennessee Titans',
		'WAS' => 'Washington Redskins'
	);

	// constructor
	public function __construct()
	{
		parent::__construct();
	}

	// return the codes
	public function codes()
	{
		return $this->codes;
	}

	// return the team name for a code
	public function name($code)
	{
		return (isset($this->codes['$code'])) ? $this->codes[$code] : '

	

	';
	}

	// lookup the code for a team
	public function lookup($name)
	{
		foreach ($this->codes as $key->$value)
			if ($name == $value)
				return $key;
		return null;
	}

}
