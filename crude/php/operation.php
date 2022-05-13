<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

if (isset($_POST['create'])){
   createData();
}

if (isset($_POST['update'])){
    UpdateData();
}

if (isset($_POST['delete'])){
    deleteRecord();
}

if (isset($_POST['deleteall'])){
    deleteAl();
}

function createData(){
$web = textboxValue("web");
$finance = textboxValue("finance");
$network = textboxValue("network");
$internship = textboxValue("intern");

if ($web && $finance && $network && $internship){
    $sql = "INSERT INTO grade (web, finance, network, intern)
            VALUES ('$web','$finance','$network','$internship')";

    if (mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success", "Record successfully inserted");
        echo "";
    }else{
        echo "Error";
    }

}else{
    TextNode("error", "Provide data in the table");
}
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

function getData()
{
    $sql = "SELECT * FROM grade";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}


function UpdateData(){
$web = textboxValue("web");
$finance = textboxValue("finance");
    $network = textboxValue("network");
    $intern = textboxValue("intern");
if ($web && $finance && $network && $intern){
$sql = "
UPDATE grade SET web='$web', finance='$finance', network='$network', internship= '$intern'
";

if (mysqli_query($GLOBALS['con'], $sql)){
    TextNode("success","Data successfully updated");
}else{
    TextNode("error","Unable to update data");
}
}else{
    TextNode("error","Select data using edit icon");
}
}

function deleteRecord(){
$web =(int)textboxValue("web");
$sql= "DELETE FROM grade WHERE web=$web";

if (mysqli_query($GLOBALS['con'], $sql)){
    TextNode("success","Record deleted");
}else{
    TextNode("error", "Unable to delete record");
}
}

function deleteBtn(){
    $result=getData();
$i = 0;
    if ($result){
        while($row =mysqli_fetch_assoc($result)){
       $i++;
if ($i>3){
buttonElement("btn-deleteall","btn btn-primary", "<i class='fas fa-trash'></i> Delete All", "deleteall", "");
return;
}
        }

    }
}

function deleteAl(){
    $sql ="DROP TABLE grade";

    if (mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success", "Grades deleted");
        Createdb();
    }else{
        TextNode("error", "Grades not deleted");
    }
}