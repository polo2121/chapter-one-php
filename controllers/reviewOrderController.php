<?php

require_once('../models/addreesModel.php');

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    // echo "user ma par lar";
    header('Location: ./login.php');
}
$deliveryAddress = getDeliveryAddress($_SESSION['user']['id']);
