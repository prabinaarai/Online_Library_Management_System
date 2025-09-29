<?php
include("data_class.php");



$bookname=$_POST['bookname'];
$bookdetail=$_POST['bookdetail'];
$bookaudor=$_POST['bookaudor'];
$bookpub=$_POST['bookpub'];
$courses=$_POST['cousers'];
$bookprice=$_POST['bookprice'];
$bookquantity=$_POST['bookquantity'];



if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"uploads/" . $_FILES["bookphoto"]["name"])) {

    $bookpic=$_FILES["bookphoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->addbook($bookpic,$bookname,$bookdetail,$bookaudor,$bookpub,$courses,$bookprice,$bookquantity);
  } 
  else {
     echo "File not uploaded";
  }