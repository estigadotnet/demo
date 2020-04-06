<?php
namespace PHPMaker2020\p_iuran_1_0;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(4, "mi_c201_home", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "c201_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mci_Setup", $MenuLanguage->MenuPhrase("5", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_loket", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_loketlist.php", 5, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t002_anggota", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_anggotalist.php", 5, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mci_Transaksi", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t101_pembayaran", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t101_pembayaranlist.php", 6, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(4, "mi_c201_home", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "c201_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mci_Setup", $MenuLanguage->MenuPhrase("5", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_loket", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_loketlist.php", 5, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t002_anggota", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_anggotalist.php", 5, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mci_Transaksi", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t101_pembayaran", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t101_pembayaranlist.php", 6, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>