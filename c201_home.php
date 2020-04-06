<?php
namespace PHPMaker2020\p_iuran_1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();
?>
<?php include_once "autoload.php"; ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$c201_home = new c201_home();

// Run the page
$c201_home->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<!--CUSTOM_FILE_CONTENT_BEGIN--><!--CUSTOM_FILE_CONTENT_END-->
<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c201_home->terminate();
?>