<?php
namespace PHPMaker2020\p_iuran_1_0;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t101_pembayaran_delete = new t101_pembayaran_delete();

// Run the page
$t101_pembayaran_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_pembayaran_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_pembayarandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_pembayarandelete = currentForm = new ew.Form("ft101_pembayarandelete", "delete");
	loadjs.done("ft101_pembayarandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_pembayaran_delete->showPageHeader(); ?>
<?php
$t101_pembayaran_delete->showMessage();
?>
<form name="ft101_pembayarandelete" id="ft101_pembayarandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_pembayaran">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_pembayaran_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_pembayaran_delete->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t101_pembayaran_delete->Tanggal->headerCellClass() ?>"><span id="elh_t101_pembayaran_Tanggal" class="t101_pembayaran_Tanggal"><?php echo $t101_pembayaran_delete->Tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($t101_pembayaran_delete->loket_id->Visible) { // loket_id ?>
		<th class="<?php echo $t101_pembayaran_delete->loket_id->headerCellClass() ?>"><span id="elh_t101_pembayaran_loket_id" class="t101_pembayaran_loket_id"><?php echo $t101_pembayaran_delete->loket_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_pembayaran_delete->anggota_id->Visible) { // anggota_id ?>
		<th class="<?php echo $t101_pembayaran_delete->anggota_id->headerCellClass() ?>"><span id="elh_t101_pembayaran_anggota_id" class="t101_pembayaran_anggota_id"><?php echo $t101_pembayaran_delete->anggota_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_pembayaran_delete->Jumlah->Visible) { // Jumlah ?>
		<th class="<?php echo $t101_pembayaran_delete->Jumlah->headerCellClass() ?>"><span id="elh_t101_pembayaran_Jumlah" class="t101_pembayaran_Jumlah"><?php echo $t101_pembayaran_delete->Jumlah->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_pembayaran_delete->RecordCount = 0;
$i = 0;
while (!$t101_pembayaran_delete->Recordset->EOF) {
	$t101_pembayaran_delete->RecordCount++;
	$t101_pembayaran_delete->RowCount++;

	// Set row properties
	$t101_pembayaran->resetAttributes();
	$t101_pembayaran->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_pembayaran_delete->loadRowValues($t101_pembayaran_delete->Recordset);

	// Render row
	$t101_pembayaran_delete->renderRow();
?>
	<tr <?php echo $t101_pembayaran->rowAttributes() ?>>
<?php if ($t101_pembayaran_delete->Tanggal->Visible) { // Tanggal ?>
		<td <?php echo $t101_pembayaran_delete->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_delete->RowCount ?>_t101_pembayaran_Tanggal" class="t101_pembayaran_Tanggal">
<span<?php echo $t101_pembayaran_delete->Tanggal->viewAttributes() ?>><?php echo $t101_pembayaran_delete->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_pembayaran_delete->loket_id->Visible) { // loket_id ?>
		<td <?php echo $t101_pembayaran_delete->loket_id->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_delete->RowCount ?>_t101_pembayaran_loket_id" class="t101_pembayaran_loket_id">
<span<?php echo $t101_pembayaran_delete->loket_id->viewAttributes() ?>><?php echo $t101_pembayaran_delete->loket_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_pembayaran_delete->anggota_id->Visible) { // anggota_id ?>
		<td <?php echo $t101_pembayaran_delete->anggota_id->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_delete->RowCount ?>_t101_pembayaran_anggota_id" class="t101_pembayaran_anggota_id">
<span<?php echo $t101_pembayaran_delete->anggota_id->viewAttributes() ?>><?php echo $t101_pembayaran_delete->anggota_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_pembayaran_delete->Jumlah->Visible) { // Jumlah ?>
		<td <?php echo $t101_pembayaran_delete->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_delete->RowCount ?>_t101_pembayaran_Jumlah" class="t101_pembayaran_Jumlah">
<span<?php echo $t101_pembayaran_delete->Jumlah->viewAttributes() ?>><?php echo $t101_pembayaran_delete->Jumlah->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_pembayaran_delete->Recordset->moveNext();
}
$t101_pembayaran_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_pembayaran_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_pembayaran_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_pembayaran_delete->terminate();
?>