<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yoda Speak</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
</head>
<body>
    <?php
    
        require_once 'vendor/autoload.php';
        require 'classes.php';

        
        echo'
            <form action="' .$_SERVER['PHP_SELF']. '" method="post">
                Sentence:<br /> 
                <input type="text" name="sentence">
                <input type="submit">
            </form>
            <br />
            <div id="spinner" style="display:none;"><img src="713.gif"></div>
            <div id="main"></div>';


    ?>

    <script>

    $(document).ready(function() {
        $("form").on("submit", function(event) {
            event.preventDefault();
            // alert('testing');
            $('#spinner').css("display", "block");

            $.ajax({
                url: "https://yoda.p.mashape.com/yoda?sentence=You+will+learn+how+to+speak+like+me+someday.",
                type: 'GET',
                // data: {},
                dataType: 'html',
                success: function(data) { 
                    console.log(data);
                    $('#spinner').css("display", "none");
                    $('#main').html(data);
                },
                error: function(err) { console.log(err); },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("X-Mashape-Authorization", "os0f5yxvndmshuOUIsim848yB3cVp1rVQGbjsneGkkO9qcOuHv");
                }
            });
        });
    });
    </script>


    <?php
        // var_dump($_POST);

        // if(isset($_POST['submit'])) {
            // $sentence = $_POST['sentence'];

            // var_dump($sentence);

            // $formatted_sentence = str_replace(' ', '+', $sentence);

            // var_dump($formatted_sentence);
 
            // $request = new Sentence();

            // $request->send_request($formatted_sentence);
        // }

        

        
    ?>
    
</body>
</html>