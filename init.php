<?php

function part($part, $vars = [])
{
  extract($vars);
  include dirname(__FILE__) . "/parts/{$part}.php";
}
