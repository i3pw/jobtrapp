<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 22.08.2015
 * Time: 11:11
 */

// masalar - class Table
// sipariş - class Order
// menü - class Menu
require_once "inc/global.php";

$usrObj = new User();
$cObj = new Company();
$showCompany = $cObj->getShowCompany();

if($usrObj->isLoggedIn() == "")
{
    $usrObj->redirect('login.php');
}