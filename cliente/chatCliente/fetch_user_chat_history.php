<?php
//fetch_user_chat_history.php

include('chat.php');

session_start();

echo fetch_user_chat_history($_SESSION['codCliente'], $_POST['to_user_id'], $connect);

?>