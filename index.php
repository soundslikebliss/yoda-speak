<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yoda Speak</title>
</head>
<body>
    <?php
    
        require_once 'vendor/autoload.php';
        require 'classes.php';

        Unirest\Request::verifyPeer(false);

        $sentence = new Sentence();

        $sentence->send_request();


        
        // $response = Unirest\Request::get("https://yoda.p.mashape.com/yoda?sentence=You+will+learn+how+to+speak+like+me+someday.",
        //     array(
        //         "X-Mashape-Key" => "os0f5yxvndmshuOUIsim848yB3cVp1rVQGbjsneGkkO9qcOuHv",
        //         "Accept" => "text/plain"
        //     )
        // );
        
        // echo '<h2>' .var_dump($response). '</h2>';
        // echo '<h1>Response Body: ' .$response->body. '</h1>';
        
    ?>
    
</body>
</html>