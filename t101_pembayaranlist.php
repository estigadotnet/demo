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
$t101_pembayaran_list = new t101_pembayaran_list();

// Run the page
$t101_pembayaran_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_pembayaran_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_pembayaran_list->isExport()) { ?>
<script>
var ft101_pembayaranlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft101_pembayaranlist = currentForm = new ew.Form("ft101_pembayaranlist", "list");
	ft101_pembayaranlist.formKeyCountName = '<?php echo $t101_pembayaran_list->FormKeyCountName ?>';
	loadjs.done("ft101_pembayaranlist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_pembayaran_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_pembayaran_list->TotalRecords > 0 && $t101_pembayaran_list->ExportOptions->visible()) { ?>
<?php $t101_pembayaran_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_pembayaran_list->ImportOptions->visible()) { ?>
<?php $t101_pembayaran_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_pembayaran_list->renderOtherOptions();
?>
<?php $t101_pembayaran_list->showPageHeader(); ?>
<?php
$t101_pembayaran_list->showMessage();
?>
<?php if ($t101_pembayaran_list->TotalRecords > 0 || $t101_pembayaran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_pembayaran_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_pembayaran">
<form name="ft101_pembayaranlist" id="ft101_pembayaranlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_pembayaran">
<div id="gmp_t101_pembayaran" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t101_pembayaran_list->TotalRecords > 0 || $t101_pembayaran_list->isGridEdit()) { ?>
<table id="tbl_t101_pembayaranlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_pembayaran->RowType = ROWTYPE_HEADER;

// Render list options
$t101_pembayaran_list->renderListOptions();

// Render list options (header, left)
$t101_pembayaran_list->ListOptions->render("header", "left");
?>
<?php if ($t101_pembayaran_list->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t101_pembayaran_list->SortUrl($t101_pembayaran_list->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t101_pembayaran_list->Tanggal->headerCellClass() ?>"><div id="elh_t101_pembayaran_Tanggal" class="t101_pembayaran_Tanggal"><div class="ew-table-header-caption"><?php echo $t101_pembayaran_list->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t101_pembayaran_list->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_pembayaran_list->SortUrl($t101_pembayaran_list->Tanggal) ?>', 1);"><div id="elh_t101_pembayaran_Tanggal" class="t101_pembayaran_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_pembayaran_list->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_pembayaran_list->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_pembayaran_list->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_pembayaran_list->loket_id->Visible) { // loket_id ?>
	<?php if ($t101_pembayaran_list->SortUrl($t101_pembayaran_list->loket_id) == "") { ?>
		<th data-name="loket_id" class="<?php echo $t101_pembayaran_list->loket_id->headerCellClass() ?>"><div id="elh_t101_pembayaran_loket_id" class="t101_pembayaran_loket_id"><div class="ew-table-header-caption"><?php echo $t101_pembayaran_list->loket_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="loket_id" class="<?php echo $t101_pembayaran_list->loket_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_pembayaran_list->SortUrl($t101_pembayaran_list->loket_id) ?>', 1);"><div id="elh_t101_pembayaran_loket_id" class="t101_pembayaran_loket_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_pembayaran_list->loket_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_pembayaran_list->loket_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_pembayaran_list->loket_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_pembayaran_list->anggota_id->Visible) { // anggota_id ?>
	<?php if ($t101_pembayaran_list->SortUrl($t101_pembayaran_list->anggota_id) == "") { ?>
		<th data-name="anggota_id" class="<?php echo $t101_pembayaran_list->anggota_id->headerCellClass() ?>"><div id="elh_t101_pembayaran_anggota_id" class="t101_pembayaran_anggota_id"><div class="ew-table-header-caption"><?php echo $t101_pembayaran_list->anggota_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="anggota_id" class="<?php echo $t101_pembayaran_list->anggota_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_pembayaran_list->SortUrl($t101_pembayaran_list->anggota_id) ?>', 1);"><div id="elh_t101_pembayaran_anggota_id" class="t101_pembayaran_anggota_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_pembayaran_list->anggota_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_pembayaran_list->anggota_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_pembayaran_list->anggota_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_pembayaran_list->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t101_pembayaran_list->SortUrl($t101_pembayaran_list->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $t101_pembayaran_list->Jumlah->headerCellClass() ?>"><div id="elh_t101_pembayaran_Jumlah" class="t101_pembayaran_Jumlah"><div class="ew-table-header-caption"><?php echo $t101_pembayaran_list->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $t101_pembayaran_list->Jumlah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_pembayaran_list->SortUrl($t101_pembayaran_list->Jumlah) ?>', 1);"><div id="elh_t101_pembayaran_Jumlah" class="t101_pembayaran_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_pembayaran_list->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_pembayaran_list->Jumlah->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_pembayaran_list->Jumlah->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_pembayaran_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_pembayaran_list->ExportAll && $t101_pembayaran_list->isExport()) {
	$t101_pembayaran_list->StopRecord = $t101_pembayaran_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t101_pembayaran_list->TotalRecords > $t101_pembayaran_list->StartRecord + $t101_pembayaran_list->DisplayRecords - 1)
		$t101_pembayaran_list->StopRecord = $t101_pembayaran_list->StartRecord + $t101_pembayaran_list->DisplayRecords - 1;
	else
		$t101_pembayaran_list->StopRecord = $t101_pembayaran_list->TotalRecords;
}
$t101_pembayaran_list->RecordCount = $t101_pembayaran_list->StartRecord - 1;
if ($t101_pembayaran_list->Recordset && !$t101_pembayaran_list->Recordset->EOF) {
	$t101_pembayaran_list->Recordset->moveFirst();
	$selectLimit = $t101_pembayaran_list->UseSelectLimit;
	if (!$selectLimit && $t101_pembayaran_list->StartRecord > 1)
		$t101_pembayaran_list->Recordset->move($t101_pembayaran_list->StartRecord - 1);
} elseif (!$t101_pembayaran->AllowAddDeleteRow && $t101_pembayaran_list->StopRecord == 0) {
	$t101_pembayaran_list->StopRecord = $t101_pembayaran->GridAddRowCount;
}

// Initialize aggregate
$t101_pembayaran->RowType = ROWTYPE_AGGREGATEINIT;
$t101_pembayaran->resetAttributes();
$t101_pembayaran_list->renderRow();
while ($t101_pembayaran_list->RecordCount < $t101_pembayaran_list->StopRecord) {
	$t101_pembayaran_list->RecordCount++;
	if ($t101_pembayaran_list->RecordCount >= $t101_pembayaran_list->StartRecord) {
		$t101_pembayaran_list->RowCount++;

		// Set up key count
		$t101_pembayaran_list->KeyCount = $t101_pembayaran_list->RowIndex;

		// Init row class and style
		$t101_pembayaran->resetAttributes();
		$t101_pembayaran->CssClass = "";
		if ($t101_pembayaran_list->isGridAdd()) {
		} else {
			$t101_pembayaran_list->loadRowValues($t101_pembayaran_list->Recordset); // Load row values
		}
		$t101_pembayaran->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_pembayaran->RowAttrs->merge(["data-rowindex" => $t101_pembayaran_list->RowCount, "id" => "r" . $t101_pembayaran_list->RowCount . "_t101_pembayaran", "data-rowtype" => $t101_pembayaran->RowType]);

		// Render row
		$t101_pembayaran_list->renderRow();

		// Render list options
		$t101_pembayaran_list->renderListOptions();
?>
	<tr <?php echo $t101_pembayaran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_pembayaran_list->ListOptions->render("body", "left", $t101_pembayaran_list->RowCount);
?>
	<?php if ($t101_pembayaran_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" <?php echo $t101_pembayaran_list->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_list->RowCount ?>_t101_pembayaran_Tanggal">
<span<?php echo $t101_pembayaran_list->Tanggal->viewAttributes() ?>><?php echo $t101_pembayaran_list->Tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_pembayaran_list->loket_id->Visible) { // loket_id ?>
		<td data-name="loket_id" <?php echo $t101_pembayaran_list->loket_id->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_list->RowCount ?>_t101_pembayaran_loket_id">
<span<?php echo $t101_pembayaran_list->loket_id->viewAttributes() ?>><?php echo $t101_pembayaran_list->loket_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_pembayaran_list->anggota_id->Visible) { // anggota_id ?>
		<td data-name="anggota_id" <?php echo $t101_pembayaran_list->anggota_id->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_list->RowCount ?>_t101_pembayaran_anggota_id">
<span<?php echo $t101_pembayaran_list->anggota_id->viewAttributes() ?>><?php echo $t101_pembayaran_list->anggota_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_pembayaran_list->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah" <?php echo $t101_pembayaran_list->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $t101_pembayaran_list->RowCount ?>_t101_pembayaran_Jumlah">
<span<?php echo $t101_pembayaran_list->Jumlah->viewAttributes() ?>><?php echo $t101_pembayaran_list->Jumlah->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_pembayaran_list->ListOptions->render("body", "right", $t101_pembayaran_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t101_pembayaran_list->isGridAdd())
		$t101_pembayaran_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t101_pembayaran->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_pembayaran_list->Recordset)
	$t101_pembayaran_list->Recordset->Close();
?>
<?php if (!$t101_pembayaran_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_pembayaran_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_pembayaran_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_pembayaran_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_pembayaran_list->TotalRecords == 0 && !$t101_pembayaran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_pembayaran_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_pembayaran_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_pembayaran_list->isExport()) { ?>
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
$t101_pembayaran_list->terminate();
?>