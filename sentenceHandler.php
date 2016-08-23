<?php
require_once 'classes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = $_POST['data'];

    $yodaSentence = new Sentence();

    $yodaSentence->send_request($data);

}
?>
