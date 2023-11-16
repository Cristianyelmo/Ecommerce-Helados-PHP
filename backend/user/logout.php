<?php

/* este script destruye todas las sessiones y redirige al index.php */
session_start();
session_destroy();


header('location:../../views/user/index.php')



?>