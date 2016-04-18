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

        

        $sentence = new Sentence();

        $sentence->send_request();

        
    ?>
    
</body>
</html>