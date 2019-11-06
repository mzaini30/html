<?php
$file = dirname(__FILE__) . '/file.txt';
$buka = fopen($file, 'a');
fwrite($buka, 'halo');
fclose($buka);