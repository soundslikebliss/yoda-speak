<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yoda Speak</title>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
    <style media="screen">
        @media screen and (max-width:1024px){
            .wrapper {
                width: 100% !important;
                margin: 0 !important;
            }
        }
    </style>
</head>


<body style="background-color:#000;font-family: 'Quicksand', sans-serif;">

    <div class="wrapper" style="margin:10em auto; width:33%; text-align:center; background-color:#FFF; padding:4em;">
        <?php
            require 'vendor/autoload.php';
            require_once 'classes.php';
            require_once 'sentenceHandler.php';
        ?>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1 style="font-size:4em;">Yoda me!</h1>

            <input id="myField" type="text" name="sentence" placeholder="type a sentence here">
            <input type="submit">
        </form>

        <br />
        <div id="spinner" style="display:none;"><img src="713.gif"></div>
        <div id="main"></div>
    </div>


    <script>

    $(document).ready(function() {

        $("form").on("submit", function(event) {
            $('#main').html('');

            // set form input to variable
            var stuff = $("#myField").val();

            // break apart the string
            var formatted_sentence = stuff.split(" ");

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
