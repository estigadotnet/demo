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
$t002_anggota_delete = new t002_anggota_delete();

// Run the page
$t002_anggota_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_anggota_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_anggotadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft002_anggotadelete = currentForm = new ew.Form("ft002_anggotadelete", "delete");
	loadjs.done("ft002_anggotadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_anggota_delete->showPageHeader(); ?>
<?php
$t002_anggota_delete->showMessage();
?>
<form name="ft002_anggotadelete" id="ft002_anggotadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_anggota">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_anggota_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_anggota_delete->IDPEL->Visible) { // IDPEL ?>
		<th class="<?php echo $t002_anggota_delete->IDPEL->headerCellClass() ?>"><span id="elh_t002_anggota_IDPEL" class="t002_anggota_IDPEL"><?php echo $t002_anggota_delete->IDPEL->caption() ?></span></th>
<?php } ?>
<?php if ($t002_anggota_delete->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t002_anggota_delete->Nama->headerCellClass() ?>"><span id="elh_t002_anggota_Nama" class="t002_anggota_Nama"><?php echo $t002_anggota_delete->Nama->caption() ?></span></th>
<?php } ?>
<?php if ($t002_anggota_delete->Alamat->Visible) { // Alamat ?>
		<th class="<?php echo $t002_anggota_delete->Alamat->headerCellClass() ?>"><span id="elh_t002_anggota_Alamat" class="t002_anggota_Alamat"><?php echo $t002_anggota_delete->Alamat->caption() ?></span></th>
<?php } ?>
<?php if ($t002_anggota_delete->NomorHP->Visible) { // NomorHP ?>
		<th class="<?php echo $t002_anggota_delete->NomorHP->headerCellClass() ?>"><span id="elh_t002_anggota_NomorHP" class="t002_anggota_NomorHP"><?php echo $t002_anggota_delete->NomorHP->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_anggota_delete->RecordCount = 0;
$i = 0;
while (!$t002_anggota_delete->Recordset->EOF) {
	$t002_anggota_delete->RecordCount++;
	$t002_anggota_delete->RowCount++;

	// Set row properties
	$t002_anggota->resetAttributes();
	$t002_anggota->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_anggota_delete->loadRowValues($t002_anggota_delete->Recordset);

	// Render row
	$t002_anggota_delete->renderRow();
?>
	<tr <?php echo $t002_anggota->rowAttributes() ?>>
<?php if ($t002_anggota_delete->IDPEL->Visible) { // IDPEL ?>
		<td <?php echo $t002_anggota_delete->IDPEL->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_delete->RowCount ?>_t002_anggota_IDPEL" class="t002_anggota_IDPEL">
<span<?php echo $t002_anggota_delete->IDPEL->viewAttributes() ?>><?php echo $t002_anggota_delete->IDPEL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_anggota_delete->Nama->Visible) { // Nama ?>
		<td <?php echo $t002_anggota_delete->Nama->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_delete->RowCount ?>_t002_anggota_Nama" class="t002_anggota_Nama">
<span<?php echo $t002_anggota_delete->Nama->viewAttributes() ?>><?php echo $t002_anggota_delete->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_anggota_delete->Alamat->Visible) { // Alamat ?>
		<td <?php echo $t002_anggota_delete->Alamat->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_delete->RowCount ?>_t002_anggota_Alamat" class="t002_anggota_Alamat">
<span<?php echo $t002_anggota_delete->Alamat->viewAttributes() ?>><?php echo $t002_anggota_delete->Alamat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_anggota_delete->NomorHP->Visible) { // NomorHP ?>
		<td <?php echo $t002_anggota_delete->NomorHP->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_delete->RowCount ?>_t002_anggota_NomorHP" class="t002_anggota_NomorHP">
<span<?php echo $t002_anggota_delete->NomorHP->viewAttributes() ?>><?php echo $t002_anggota_delete->NomorHP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_anggota_delete->Recordset->moveNext();
}
$t002_anggota_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_anggota_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_anggota_delete->showPageFooter();
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
$t002_anggota_delete->terminate();
?>