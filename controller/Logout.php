<?php

function DisconnectUserAction()
{
    if (isset($_SESSION['email'])) {
        session_start();
        session_destroy();
        header('Location: homepage');
    }
}