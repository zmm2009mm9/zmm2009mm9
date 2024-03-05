<?php 


$update = file_get_contents('php://input');

file_put_contents("a.txt", $update);