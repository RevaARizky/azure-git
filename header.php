<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased font-sans overflow-x-hidden text-theme-blue'); ?>>


<?php get_template_part('parts/fixed-header'); ?>
<main id="primary" class="">
<div id="smooth-wrapper">
<div id="smooth-content">

<?php get_template_part('parts/header'); ?>