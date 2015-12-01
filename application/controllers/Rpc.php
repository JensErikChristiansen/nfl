<?php

/**
 * XML-RPC Server to provide data to student webapps
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Rpc extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	// XML-RPC service endpoint
	function index()
	{
		$this->load->library('xmlrpc');
		$this->load->library('xmlrpcs');
//	$this->xmlrpc->set_debug(TRUE);
		// Had issues with only a single remote method defined, so added a bogus one.
		$config['functions']['since'] = array('function' => 'rpc.scores');
		$config['functions']['since2'] = array('function' => 'rpc.scores');
		$config['object'] = $this;

		$this->xmlrpcs->initialize($config);
		$this->xmlrpcs->serve();
	}

	// return all scores past a specific date
	function scores($request)
	{
		$parameters = $request->output_parameters();
		$from = isset($parameters[0]) ? $parameters[0] : '20150830';

		$this->load->model('results');
		$list = $this->results->since($from);

		$response = array();
		// wrap each game result
		foreach ($list as $one)
		{
			// extract the attributes
			$attributes = array();
			foreach ($one->attributes() as $key => $val)
				$attributes[$key] = (string) $val;
			$attributes['score'] = (string) $one;
			$response[] = array($attributes, 'struct');
		}
		// and wrap the collection of results
		$response = array($response, 'array');

		return $this->xmlrpc->send_response($response);
	}

}
