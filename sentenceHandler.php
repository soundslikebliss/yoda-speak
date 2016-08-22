<?php

require_once 'classes.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = $_POST['data'];

    $something = new Sentence();

    $something->send_request($data);

}

 ?>
