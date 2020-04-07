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
$t002_anggota_list = new t002_anggota_list();

// Run the page
$t002_anggota_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_anggota_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_anggota_list->isExport()) { ?>
<script>
var ft002_anggotalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_anggotalist = currentForm = new ew.Form("ft002_anggotalist", "list");
	ft002_anggotalist.formKeyCountName = '<?php echo $t002_anggota_list->FormKeyCountName ?>';
	loadjs.done("ft002_anggotalist");
});
var ft002_anggotalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft002_anggotalistsrch = currentSearchForm = new ew.Form("ft002_anggotalistsrch");

	// Dynamic selection lists
	// Filters

	ft002_anggotalistsrch.filterList = <?php echo $t002_anggota_list->getFilterList() ?>;
	loadjs.done("ft002_anggotalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_anggota_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_anggota_list->TotalRecords > 0 && $t002_anggota_list->ExportOptions->visible()) { ?>
<?php $t002_anggota_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_anggota_list->ImportOptions->visible()) { ?>
<?php $t002_anggota_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_anggota_list->SearchOptions->visible()) { ?>
<?php $t002_anggota_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_anggota_list->FilterOptions->visible()) { ?>
<?php $t002_anggota_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_anggota_list->renderOtherOptions();
?>
<?php if (!$t002_anggota_list->isExport() && !$t002_anggota->CurrentAction) { ?>
<form name="ft002_anggotalistsrch" id="ft002_anggotalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft002_anggotalistsrch-search-panel" class="<?php echo $t002_anggota_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t002_anggota">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t002_anggota_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t002_anggota_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t002_anggota_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t002_anggota_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t002_anggota_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t002_anggota_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t002_anggota_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t002_anggota_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $t002_anggota_list->showPageHeader(); ?>
<?php
$t002_anggota_list->showMessage();
?>
<?php if ($t002_anggota_list->TotalRecords > 0 || $t002_anggota->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_anggota_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_anggota">
<form name="ft002_anggotalist" id="ft002_anggotalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_anggota">
<div id="gmp_t002_anggota" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_anggota_list->TotalRecords > 0 || $t002_anggota_list->isGridEdit()) { ?>
<table id="tbl_t002_anggotalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_anggota->RowType = ROWTYPE_HEADER;

// Render list options
$t002_anggota_list->renderListOptions();

// Render list options (header, left)
$t002_anggota_list->ListOptions->render("header", "left");
?>
<?php if ($t002_anggota_list->IDPEL->Visible) { // IDPEL ?>
	<?php if ($t002_anggota_list->SortUrl($t002_anggota_list->IDPEL) == "") { ?>
		<th data-name="IDPEL" class="<?php echo $t002_anggota_list->IDPEL->headerCellClass() ?>"><div id="elh_t002_anggota_IDPEL" class="t002_anggota_IDPEL"><div class="ew-table-header-caption"><?php echo $t002_anggota_list->IDPEL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IDPEL" class="<?php echo $t002_anggota_list->IDPEL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_anggota_list->SortUrl($t002_anggota_list->IDPEL) ?>', 1);"><div id="elh_t002_anggota_IDPEL" class="t002_anggota_IDPEL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_anggota_list->IDPEL->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_anggota_list->IDPEL->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_anggota_list->IDPEL->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_anggota_list->Nama->Visible) { // Nama ?>
	<?php if ($t002_anggota_list->SortUrl($t002_anggota_list->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t002_anggota_list->Nama->headerCellClass() ?>"><div id="elh_t002_anggota_Nama" class="t002_anggota_Nama"><div class="ew-table-header-caption"><?php echo $t002_anggota_list->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t002_anggota_list->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_anggota_list->SortUrl($t002_anggota_list->Nama) ?>', 1);"><div id="elh_t002_anggota_Nama" class="t002_anggota_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_anggota_list->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_anggota_list->Nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_anggota_list->Nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_anggota_list->Alamat->Visible) { // Alamat ?>
	<?php if ($t002_anggota_list->SortUrl($t002_anggota_list->Alamat) == "") { ?>
		<th data-name="Alamat" class="<?php echo $t002_anggota_list->Alamat->headerCellClass() ?>"><div id="elh_t002_anggota_Alamat" class="t002_anggota_Alamat"><div class="ew-table-header-caption"><?php echo $t002_anggota_list->Alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Alamat" class="<?php echo $t002_anggota_list->Alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_anggota_list->SortUrl($t002_anggota_list->Alamat) ?>', 1);"><div id="elh_t002_anggota_Alamat" class="t002_anggota_Alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_anggota_list->Alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_anggota_list->Alamat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_anggota_list->Alamat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_anggota_list->NomorHP->Visible) { // NomorHP ?>
	<?php if ($t002_anggota_list->SortUrl($t002_anggota_list->NomorHP) == "") { ?>
		<th data-name="NomorHP" class="<?php echo $t002_anggota_list->NomorHP->headerCellClass() ?>"><div id="elh_t002_anggota_NomorHP" class="t002_anggota_NomorHP"><div class="ew-table-header-caption"><?php echo $t002_anggota_list->NomorHP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NomorHP" class="<?php echo $t002_anggota_list->NomorHP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_anggota_list->SortUrl($t002_anggota_list->NomorHP) ?>', 1);"><div id="elh_t002_anggota_NomorHP" class="t002_anggota_NomorHP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_anggota_list->NomorHP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_anggota_list->NomorHP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_anggota_list->NomorHP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_anggota_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_anggota_list->ExportAll && $t002_anggota_list->isExport()) {
	$t002_anggota_list->StopRecord = $t002_anggota_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_anggota_list->TotalRecords > $t002_anggota_list->StartRecord + $t002_anggota_list->DisplayRecords - 1)
		$t002_anggota_list->StopRecord = $t002_anggota_list->StartRecord + $t002_anggota_list->DisplayRecords - 1;
	else
		$t002_anggota_list->StopRecord = $t002_anggota_list->TotalRecords;
}
$t002_anggota_list->RecordCount = $t002_anggota_list->StartRecord - 1;
if ($t002_anggota_list->Recordset && !$t002_anggota_list->Recordset->EOF) {
	$t002_anggota_list->Recordset->moveFirst();
	$selectLimit = $t002_anggota_list->UseSelectLimit;
	if (!$selectLimit && $t002_anggota_list->StartRecord > 1)
		$t002_anggota_list->Recordset->move($t002_anggota_list->StartRecord - 1);
} elseif (!$t002_anggota->AllowAddDeleteRow && $t002_anggota_list->StopRecord == 0) {
	$t002_anggota_list->StopRecord = $t002_anggota->GridAddRowCount;
}

// Initialize aggregate
$t002_anggota->RowType = ROWTYPE_AGGREGATEINIT;
$t002_anggota->resetAttributes();
$t002_anggota_list->renderRow();
while ($t002_anggota_list->RecordCount < $t002_anggota_list->StopRecord) {
	$t002_anggota_list->RecordCount++;
	if ($t002_anggota_list->RecordCount >= $t002_anggota_list->StartRecord) {
		$t002_anggota_list->RowCount++;

		// Set up key count
		$t002_anggota_list->KeyCount = $t002_anggota_list->RowIndex;

		// Init row class and style
		$t002_anggota->resetAttributes();
		$t002_anggota->CssClass = "";
		if ($t002_anggota_list->isGridAdd()) {
		} else {
			$t002_anggota_list->loadRowValues($t002_anggota_list->Recordset); // Load row values
		}
		$t002_anggota->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t002_anggota->RowAttrs->merge(["data-rowindex" => $t002_anggota_list->RowCount, "id" => "r" . $t002_anggota_list->RowCount . "_t002_anggota", "data-rowtype" => $t002_anggota->RowType]);

		// Render row
		$t002_anggota_list->renderRow();

		// Render list options
		$t002_anggota_list->renderListOptions();
?>
	<tr <?php echo $t002_anggota->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_anggota_list->ListOptions->render("body", "left", $t002_anggota_list->RowCount);
?>
	<?php if ($t002_anggota_list->IDPEL->Visible) { // IDPEL ?>
		<td data-name="IDPEL" <?php echo $t002_anggota_list->IDPEL->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_list->RowCount ?>_t002_anggota_IDPEL">
<span<?php echo $t002_anggota_list->IDPEL->viewAttributes() ?>><?php echo $t002_anggota_list->IDPEL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t002_anggota_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama" <?php echo $t002_anggota_list->Nama->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_list->RowCount ?>_t002_anggota_Nama">
<span<?php echo $t002_anggota_list->Nama->viewAttributes() ?>><?php echo $t002_anggota_list->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t002_anggota_list->Alamat->Visible) { // Alamat ?>
		<td data-name="Alamat" <?php echo $t002_anggota_list->Alamat->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_list->RowCount ?>_t002_anggota_Alamat">
<span<?php echo $t002_anggota_list->Alamat->viewAttributes() ?>><?php echo $t002_anggota_list->Alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t002_anggota_list->NomorHP->Visible) { // NomorHP ?>
		<td data-name="NomorHP" <?php echo $t002_anggota_list->NomorHP->cellAttributes() ?>>
<span id="el<?php echo $t002_anggota_list->RowCount ?>_t002_anggota_NomorHP">
<span<?php echo $t002_anggota_list->NomorHP->viewAttributes() ?>><?php echo $t002_anggota_list->NomorHP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_anggota_list->ListOptions->render("body", "right", $t002_anggota_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t002_anggota_list->isGridAdd())
		$t002_anggota_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t002_anggota->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_anggota_list->Recordset)
	$t002_anggota_list->Recordset->Close();
?>
<?php if (!$t002_anggota_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_anggota_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_anggota_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_anggota_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_anggota_list->TotalRecords == 0 && !$t002_anggota->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_anggota_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_anggota_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_anggota_list->isExport()) { ?>
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
$t002_anggota_list->terminate();
?>