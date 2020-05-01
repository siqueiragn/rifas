<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Rifas do Sertão">
    <meta name="keywords" content="rifas, sorteio, premios">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rifas do Sertão</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/bootstrap.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/font-awesome.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/flaticon.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/owl.carousel.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/jquery-ui.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/nice-select.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/magnific-popup.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/slicknav.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/style.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/slides.css');?>" type="text/css">
</head>

<body>


<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="logo">
                <a class="logo-text" href="<?php echo site_url();?>">Rifas do Sertão</a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li><a href="<?php echo site_url();?>">Home</a></li>
                    <li><a href="<?php echo site_url('rifas/listar');?>">Sorteios</a></li>
                    <li><a href="<?php echo site_url('pagamentos/listar');?>">Pagamentos</a></li>
                    <li><a href="<?php echo site_url();?>">Contato</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->