<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if($_COOKIE["level"] == '2') {
    header( "Location: ../" );
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.css">
    <!-- //? start font awesome -->
    <script src="../fontawesome-free-5.15.3-web/js/all.js" crossorigin="anonymous"></script>
    <!-- //? End font awesome -->
    <!-- //? Start Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- //? End Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- //? Start Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- //? End Sweet Alert -->
    <title>Document</title>
</head>

<body>