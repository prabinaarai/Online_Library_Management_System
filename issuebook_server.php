<?php

include("data_class.php");

$book=$_POST['book'];
// $id=$_POST['id'];
$userselect= $_POST['userselect'];
$getdate= date("d/m/Y");
$days= $_POST['days'];


$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));
if (strtotime($returnDate) > time()) {
    $days = 0;
}

$obj=new data();
$obj->setconnection();
$obj->issuebook($book,$userselect,$days,$getdate,$returnDate);

