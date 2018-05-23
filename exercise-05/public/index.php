<?php

ob_start();
include "../secret.php";
$html = ob_get_clean();

echo $html;
