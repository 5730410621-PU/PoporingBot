<?php

$im = file_get_contents("./appinline_design.jpeg");
header("Content-type: image/jpeg");
echo $im;
