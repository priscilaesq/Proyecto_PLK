<?php
function print_x($var, $die = false) {
  echo "<pre>";
    print_r($var);
  echo "</pre>";
  if($die) die();
}
