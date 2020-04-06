<?php
namespace PHPMaker2020\p_iuran_1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t002_anggota_view = new t002_anggota_view();

// Run the page
$t002_anggota_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_anggota_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_anggota_view->isExport()) { ?>
<script>
var ft002_anggotaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft002_anggotaview = currentForm = new ew.Form("ft002_anggotaview", "view");
	loadjs.done("ft002_anggotaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_anggota_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_anggota_view->ExportOptions->render("body") ?>
<?php $t002_anggota_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_anggota_view->showPageHeader(); ?>
<?php
$t002_anggota_view->showMessage();
?>
<form name="ft002_anggotaview" id="ft002_anggotaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_anggota">
<input type="hidden" name="modal" value="<?php echo (int)$t002_anggota_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_anggota_view->IDPEL->Visible) { // IDPEL ?>
	<tr id="r_IDPEL">
		<td class="<?php echo $t002_anggota_view->TableLeftColumnClass ?>"><span id="elh_t002_anggota_IDPEL"><?php echo $t002_anggota_view->IDPEL->caption() ?></span></td>
		<td data-name="IDPEL" <?php echo $t002_anggota_view->IDPEL->cellAttributes() ?>>
<span id="el_t002_anggota_IDPEL">
<span<?php echo $t002_anggota_view->IDPEL->viewAttributes() ?>><?php echo $t002_anggota_view->IDPEL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_anggota_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t002_anggota_view->TableLeftColumnClass ?>"><span id="elh_t002_anggota_Nama"><?php echo $t002_anggota_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t002_anggota_view->Nama->cellAttributes() ?>>
<span id="el_t002_anggota_Nama">
<span<?php echo $t002_anggota_view->Nama->viewAttributes() ?>><?php echo $t002_anggota_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_anggota_view->Alamat->Visible) { // Alamat ?>
	<tr id="r_Alamat">
		<td class="<?php echo $t002_anggota_view->TableLeftColumnClass ?>"><span id="elh_t002_anggota_Alamat"><?php echo $t002_anggota_view->Alamat->caption() ?></span></td>
		<td data-name="Alamat" <?php echo $t002_anggota_view->Alamat->cellAttributes() ?>>
<span id="el_t002_anggota_Alamat">
<span<?php echo $t002_anggota_view->Alamat->viewAttributes() ?>><?php echo $t002_anggota_view->Alamat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_anggota_view->NomorHP->Visible) { // NomorHP ?>
	<tr id="r_NomorHP">
		<td class="<?php echo $t002_anggota_view->TableLeftColumnClass ?>"><span id="elh_t002_anggota_NomorHP"><?php echo $t002_anggota_view->NomorHP->caption() ?></span></td>
		<td data-name="NomorHP" <?php echo $t002_anggota_view->NomorHP->cellAttributes() ?>>
<span id="el_t002_anggota_NomorHP">
<span<?php echo $t002_anggota_view->NomorHP->viewAttributes() ?>><?php echo $t002_anggota_view->NomorHP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_anggota_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_anggota_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t002_anggota_view->terminate();
?>