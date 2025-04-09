<?php
require_once("config/db_config.php");

ob_start();
include("views/request_form.php");
$content = ob_get_clean();

include("views/layout.php");
?>
