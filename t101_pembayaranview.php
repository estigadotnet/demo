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
$t101_pembayaran_view = new t101_pembayaran_view();

// Run the page
$t101_pembayaran_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_pembayaran_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_pembayaran_view->isExport()) { ?>
<script>
var ft101_pembayaranview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_pembayaranview = currentForm = new ew.Form("ft101_pembayaranview", "view");
	loadjs.done("ft101_pembayaranview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_pembayaran_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_pembayaran_view->ExportOptions->render("body") ?>
<?php $t101_pembayaran_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_pembayaran_view->showPageHeader(); ?>
<?php
$t101_pembayaran_view->showMessage();
?>
<form name="ft101_pembayaranview" id="ft101_pembayaranview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_pembayaran">
<input type="hidden" name="modal" value="<?php echo (int)$t101_pembayaran_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_pembayaran_view->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t101_pembayaran_view->TableLeftColumnClass ?>"><span id="elh_t101_pembayaran_Tanggal"><?php echo $t101_pembayaran_view->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal" <?php echo $t101_pembayaran_view->Tanggal->cellAttributes() ?>>
<span id="el_t101_pembayaran_Tanggal">
<span<?php echo $t101_pembayaran_view->Tanggal->viewAttributes() ?>><?php echo $t101_pembayaran_view->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_pembayaran_view->loket_id->Visible) { // loket_id ?>
	<tr id="r_loket_id">
		<td class="<?php echo $t101_pembayaran_view->TableLeftColumnClass ?>"><span id="elh_t101_pembayaran_loket_id"><?php echo $t101_pembayaran_view->loket_id->caption() ?></span></td>
		<td data-name="loket_id" <?php echo $t101_pembayaran_view->loket_id->cellAttributes() ?>>
<span id="el_t101_pembayaran_loket_id">
<span<?php echo $t101_pembayaran_view->loket_id->viewAttributes() ?>><?php echo $t101_pembayaran_view->loket_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_pembayaran_view->anggota_id->Visible) { // anggota_id ?>
	<tr id="r_anggota_id">
		<td class="<?php echo $t101_pembayaran_view->TableLeftColumnClass ?>"><span id="elh_t101_pembayaran_anggota_id"><?php echo $t101_pembayaran_view->anggota_id->caption() ?></span></td>
		<td data-name="anggota_id" <?php echo $t101_pembayaran_view->anggota_id->cellAttributes() ?>>
<span id="el_t101_pembayaran_anggota_id">
<span<?php echo $t101_pembayaran_view->anggota_id->viewAttributes() ?>><?php echo $t101_pembayaran_view->anggota_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_pembayaran_view->Jumlah->Visible) { // Jumlah ?>
	<tr id="r_Jumlah">
		<td class="<?php echo $t101_pembayaran_view->TableLeftColumnClass ?>"><span id="elh_t101_pembayaran_Jumlah"><?php echo $t101_pembayaran_view->Jumlah->caption() ?></span></td>
		<td data-name="Jumlah" <?php echo $t101_pembayaran_view->Jumlah->cellAttributes() ?>>
<span id="el_t101_pembayaran_Jumlah">
<span<?php echo $t101_pembayaran_view->Jumlah->viewAttributes() ?>><?php echo $t101_pembayaran_view->Jumlah->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_pembayaran_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_pembayaran_view->isExport()) { ?>
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
$t101_pembayaran_view->terminate();
?>