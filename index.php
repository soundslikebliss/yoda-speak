<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yoda Speak</title>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
</head>


<body>

    <div class="form-wrapper">

        <!-- BEGIN FORM -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1>Yoda me!</h1>

            <input id="myField" type="text" name="sentence" placeholder="type a sentence here">
            <input type="submit">
        </form>

        <br />
        <div id="spinner" style="display:none;"><img src="713.gif"></div>
        <div id="main"></div>
    </div>

    <div class="code-wrapper1">
        <pre><code>
            <h2>AJAX request</h2>
            $(document).ready(function() {
                $("form").on("submit", function(event) {
                    $('#main').html('');

                    // set form input to variable
                    var rawInput = $("#myField").val();

                    // break apart the string
                    var formatted_sentence = rawInput.split(" ");

                    // set up empty array
                    var plusses = [];

                    // add a + to each element in formatted_sentence and push to plusses array
                    formatted_sentence.forEach(function(i) {
                        i = "+" + i;
                        plusses.push(i);
                    });

                    // smash these together to create "foo+bar+foo+bar" format
                    var final_string = plusses.join("");

                    // dont go anywhere
                    event.preventDefault();

                    // what's happening? oh, we're loading!
                    $('#spinner').css("display", "block");

                    // here's the magic
                    $.ajax({
                        url: "sentenceHandler.php",
                        // sending a POST to our 'controller' (sentenceHandler.php)
                        type: 'POST',
                        // pass formatted 'final_string' as data
                        data: {data: final_string},
                        success: function(data) {
                            response=data;
                            $('#spinner').css("display", "none");
                            $('#main').html(data);
                            console.log(data);
                        },
                        error: function(err) {
                            console.log(err);
                            alert('whoops, something went haywire, please try again');
                        }
                    });
                });
            });
        </code></pre>
    </div>

    <div class="code-wrapper2">
        <pre><code>
            <h2>controller</h2>
            require_once 'classes.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = $_POST['data'];

                $yodaSentence = new Sentence();

                $yodaSentence->send_request($data);

            }
        </code></pre>
    </div>

    <div class="code-wrapper3">
        <pre><code>
            <h2>model</h2>
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
        </code></pre>
    </div>


    <script>
    $(document).ready(function() {
        $("form").on("submit", function(event) {
            $('#main').html('');

            // set form input to variable
            var rawInput = $("#myField").val();

            // break apart the string
            var formatted_sentence = rawInput.split(" ");

            // set up empty array
            var plusses = [];

            // add a + to each element in formatted_sentence and push to plusses array
            formatted_sentence.forEach(function(i) {
                i = "+" + i;
                plusses.push(i);
            });

            // smash these together to create "foo+bar+foo+bar" format
            var final_string = plusses.join("");

            // dont go anywhere
            event.preventDefault();

            // what's happening? oh, we're loading!
            $('#spinner').css("display", "block");

            // here's the magic
            $.ajax({
                url: "sentenceHandler.php",
                // sending a POST to our 'controller' (sentenceHandler.php)
                type: 'POST',
                // pass formatted 'final_string' as data
                data: {data: final_string},
                success: function(data) {
                    response=data;
                    $('#spinner').css("display", "none");
                    $('#main').html(data);
                    console.log(data);
                },
                error: function(err) {
                    console.log(err);
                    alert('whoops, something went haywire, please try again');
                }
            });
        });
    });
    </script>


</body>
</html>
