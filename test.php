<?php

ob_start(); //включение буферизации

echo 'Hello';

// $str = ob_get_contents(); //возвращает данные из буфера
// ob_end_clean(); //Очищает буфер

$str = ob_get_clean(); //возвращает данные из буфера и очищает буфер

echo $str;