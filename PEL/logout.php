<?php

session_start();
#end the current session
session_destroy();

require("config.php");

header("Location: " . $config_basedir);

?> .