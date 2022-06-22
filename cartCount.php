<?php

session_start();

if (isset($_SESSION['products'])) {
    echo count($_SESSION['products']);
} else {
    echo 0;
}
