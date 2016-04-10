<?php 


class Sentence 
{
	// public function __construct($sentence) {
	// 	$this->sentence = $sentence;
	// 	return true;
	// }

	public function send_request() {
		// $this->sentence = $sentence;

		// Unirest\Request::verifyPeer(false);
        
        $response = Unirest\Request::get("https://yoda.p.mashape.com/yoda?sentence=You+will+learn+how+to+speak+like+me+someday.",
            array(
                "X-Mashape-Key" => "os0f5yxvndmshuOUIsim848yB3cVp1rVQGbjsneGkkO9qcOuHv",
                "Accept" => "text/plain"
            )
        );

        echo '<p>' .var_dump($response). '</p>';
        echo '<h2>Response Body: ' .$response->body. '</h2>';

	}
}




 ?>