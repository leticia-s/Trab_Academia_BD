<?php

session_start();
session_destroy();

echo "<script>";
echo "   window.location='../View/login.php'";
echo "</script>";
