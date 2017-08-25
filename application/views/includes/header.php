<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <?php if(isset($image) && $image != ""){ ?>        
        <meta name="og:image" content="<?php echo $image; ?>">
        <meta name="image" content="<?php echo $image; ?>">
    <?php } ?>
    <meta name="description" content="<?php echo $description; ?>">
   
    <meta name="og:title" content="<?php echo $title; ?>">
    <meta name="og:description" content="<?php echo $description; ?>">
    <meta name="og:url" content="<?php echo current_url(); ?>">    
    <meta name="og:type" content="website">
   
    <meta name="author" content="RRishibani">
    <title><?php echo $title; ?></title>
    <!--=============== Global Css Start ===============-->
    <link href="<?php echo URL; ?>assets/site_assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/site_assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/vendors/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/site_assets/vendors/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/vendors/bootstrap_select2/css/select2-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/site_assets/vendors/wow/css/animate.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/css/sweetalert2.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/vendors/revolution-slider/css/layers.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/vendors/revolution-slider/css/navigation.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/vendors/revolution-slider/css/settings.css">
    <!--=============== Global Css End ===============-->
    <!--=============== Custom Css Start ===============-->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/site_assets/css/custom.css">

    <!--=============== Custom Css End ===============-->
</head>