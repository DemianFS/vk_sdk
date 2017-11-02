<?php

require "src/autoload.php";

$vk = new VK();

echo "<pre>";
print_r($vk->account->getProfileInfo()->response);
echo "</pre>";
