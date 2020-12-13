<?php
/** @var System\Utils\Session $session */
$session->destroy();
header("Location: login");
exit;
