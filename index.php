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

        
        echo'
            <form action="' .$_SERVER['PHP_SELF']. '" method="post">
                Sentence:<br /> 
                <input type="text" name="sentence">
                <input type="submit">
            </form>';



        var_dump($_POST);

        // if(isset($_POST['submit'])) {
            $sentence = $_POST['sentence'];

            var_dump($sentence);

            $formatted_sentence = str_replace(' ', '+', $sentence);

            var_dump($formatted_sentence);
 
            $request = new Sentence();

            $request->send_request($formatted_sentence);
        // }

        

        
    ?>
    
</body>
</html>