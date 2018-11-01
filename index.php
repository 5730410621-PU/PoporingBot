<?php

$im = file_get_contents("./image.jpeg");
header("Content-type: image/jpeg");
echo $im;
