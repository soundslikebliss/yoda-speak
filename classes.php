<?php
require_once 'vendor/autoload.php';

class Sentence
{
	private $config;

	public function __construct() {
		include("environment.php");
		$this->config = $config;
	}

	public function send_request($arg) {

      	Unirest\Request::verifyPeer(false);

        $response = Unirest\Request::get("https://yoda.p.mashape.com/yoda?sentence=$arg",
            array(
                "X-Mashape-Key" => $this->config["mashape_key"],
                "Accept" => "text/plain"
            )
        );

        echo($response->body);
	}
}
?>
