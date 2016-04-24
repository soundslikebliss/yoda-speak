<?php 


class Sentence 
{
	private $config;


	public function __construct() {
		include("environment.php");
		$this->config = $config;
	}

	public function send_request($formatted_sentence) {

      	Unirest\Request::verifyPeer(false);
      	
        // $response = Unirest\Request::get("https://yoda.p.mashape.com/yoda?sentence=You+will+learn+how+to+speak+like+me+someday.",
        $response = Unirest\Request::get("https://yoda.p.mashape.com/yoda?sentence=$formatted_sentence",
            array(
                "X-Mashape-Key" => $this->config["mashape_key"],
                "Accept" => "text/plain"
            )
        );

        echo '<p>' .var_dump($response). '</p>';
        echo '<h2>Response Body: ' .$response->body. '</h2>';

	}
}




 ?>