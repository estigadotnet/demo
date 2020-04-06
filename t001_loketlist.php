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
$t001_loket_list = new t001_loket_list();

// Run the page
$t001_loket_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_loket_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_loket_list->isExport()) { ?>
<script>
var ft001_loketlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft001_loketlist = currentForm = new ew.Form("ft001_loketlist", "list");
	ft001_loketlist.formKeyCountName = '<?php echo $t001_loket_list->FormKeyCountName ?>';
	loadjs.done("ft001_loketlist");
});
var ft001_loketlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft001_loketlistsrch = currentSearchForm = new ew.Form("ft001_loketlistsrch");

	// Dynamic selection lists
	// Filters

	ft001_loketlistsrch.filterList = <?php echo $t001_loket_list->getFilterList() ?>;
	loadjs.done("ft001_loketlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_loket_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_loket_list->TotalRecords > 0 && $t001_loket_list->ExportOptions->visible()) { ?>
<?php $t001_loket_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_loket_list->ImportOptions->visible()) { ?>
<?php $t001_loket_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_loket_list->SearchOptions->visible()) { ?>
<?php $t001_loket_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t001_loket_list->FilterOptions->visible()) { ?>
<?php $t001_loket_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_loket_list->renderOtherOptions();
?>
<?php if (!$t001_loket_list->isExport() && !$t001_loket->CurrentAction) { ?>
<form name="ft001_loketlistsrch" id="ft001_loketlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft001_loketlistsrch-search-panel" class="<?php echo $t001_loket_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t001_loket">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t001_loket_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t001_loket_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t001_loket_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t001_loket_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t001_loket_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t001_loket_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t001_loket_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t001_loket_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $t001_loket_list->showPageHeader(); ?>
<?php
$t001_loket_list->showMessage();
?>
<?php if ($t001_loket_list->TotalRecords > 0 || $t001_loket->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_loket_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_loket">
<form name="ft001_loketlist" id="ft001_loketlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_loket">
<div id="gmp_t001_loket" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t001_loket_list->TotalRecords > 0 || $t001_loket_list->isGridEdit()) { ?>
<table id="tbl_t001_loketlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_loket->RowType = ROWTYPE_HEADER;

// Render list options
$t001_loket_list->renderListOptions();

// Render list options (header, left)
$t001_loket_list->ListOptions->render("header", "left");
?>
<?php if ($t001_loket_list->Kode->Visible) { // Kode ?>
	<?php if ($t001_loket_list->SortUrl($t001_loket_list->Kode) == "") { ?>
		<th data-name="Kode" class="<?php echo $t001_loket_list->Kode->headerCellClass() ?>"><div id="elh_t001_loket_Kode" class="t001_loket_Kode"><div class="ew-table-header-caption"><?php echo $t001_loket_list->Kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kode" class="<?php echo $t001_loket_list->Kode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_loket_list->SortUrl($t001_loket_list->Kode) ?>', 1);"><div id="elh_t001_loket_Kode" class="t001_loket_Kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_loket_list->Kode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_loket_list->Kode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_loket_list->Kode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_loket_list->Nama->Visible) { // Nama ?>
	<?php if ($t001_loket_list->SortUrl($t001_loket_list->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t001_loket_list->Nama->headerCellClass() ?>"><div id="elh_t001_loket_Nama" class="t001_loket_Nama"><div class="ew-table-header-caption"><?php echo $t001_loket_list->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t001_loket_list->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_loket_list->SortUrl($t001_loket_list->Nama) ?>', 1);"><div id="elh_t001_loket_Nama" class="t001_loket_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_loket_list->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_loket_list->Nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_loket_list->Nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_loket_list->Alamat->Visible) { // Alamat ?>
	<?php if ($t001_loket_list->SortUrl($t001_loket_list->Alamat) == "") { ?>
		<th data-name="Alamat" class="<?php echo $t001_loket_list->Alamat->headerCellClass() ?>"><div id="elh_t001_loket_Alamat" class="t001_loket_Alamat"><div class="ew-table-header-caption"><?php echo $t001_loket_list->Alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Alamat" class="<?php echo $t001_loket_list->Alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_loket_list->SortUrl($t001_loket_list->Alamat) ?>', 1);"><div id="elh_t001_loket_Alamat" class="t001_loket_Alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_loket_list->Alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_loket_list->Alamat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_loket_list->Alamat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_loket_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t001_loket_list->ExportAll && $t001_loket_list->isExport()) {
	$t001_loket_list->StopRecord = $t001_loket_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t001_loket_list->TotalRecords > $t001_loket_list->StartRecord + $t001_loket_list->DisplayRecords - 1)
		$t001_loket_list->StopRecord = $t001_loket_list->StartRecord + $t001_loket_list->DisplayRecords - 1;
	else
		$t001_loket_list->StopRecord = $t001_loket_list->TotalRecords;
}
$t001_loket_list->RecordCount = $t001_loket_list->StartRecord - 1;
if ($t001_loket_list->Recordset && !$t001_loket_list->Recordset->EOF) {
	$t001_loket_list->Recordset->moveFirst();
	$selectLimit = $t001_loket_list->UseSelectLimit;
	if (!$selectLimit && $t001_loket_list->StartRecord > 1)
		$t001_loket_list->Recordset->move($t001_loket_list->StartRecord - 1);
} elseif (!$t001_loket->AllowAddDeleteRow && $t001_loket_list->StopRecord == 0) {
	$t001_loket_list->StopRecord = $t001_loket->GridAddRowCount;
}

// Initialize aggregate
$t001_loket->RowType = ROWTYPE_AGGREGATEINIT;
$t001_loket->resetAttributes();
$t001_loket_list->renderRow();
while ($t001_loket_list->RecordCount < $t001_loket_list->StopRecord) {
	$t001_loket_list->RecordCount++;
	if ($t001_loket_list->RecordCount >= $t001_loket_list->StartRecord) {
		$t001_loket_list->RowCount++;

		// Set up key count
		$t001_loket_list->KeyCount = $t001_loket_list->RowIndex;

		// Init row class and style
		$t001_loket->resetAttributes();
		$t001_loket->CssClass = "";
		if ($t001_loket_list->isGridAdd()) {
		} else {
			$t001_loket_list->loadRowValues($t001_loket_list->Recordset); // Load row values
		}
		$t001_loket->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t001_loket->RowAttrs->merge(["data-rowindex" => $t001_loket_list->RowCount, "id" => "r" . $t001_loket_list->RowCount . "_t001_loket", "data-rowtype" => $t001_loket->RowType]);

		// Render row
		$t001_loket_list->renderRow();

		// Render list options
		$t001_loket_list->renderListOptions();
?>
	<tr <?php echo $t001_loket->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_loket_list->ListOptions->render("body", "left", $t001_loket_list->RowCount);
?>
	<?php if ($t001_loket_list->Kode->Visible) { // Kode ?>
		<td data-name="Kode" <?php echo $t001_loket_list->Kode->cellAttributes() ?>>
<span id="el<?php echo $t001_loket_list->RowCount ?>_t001_loket_Kode">
<span<?php echo $t001_loket_list->Kode->viewAttributes() ?>><?php echo $t001_loket_list->Kode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t001_loket_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama" <?php echo $t001_loket_list->Nama->cellAttributes() ?>>
<span id="el<?php echo $t001_loket_list->RowCount ?>_t001_loket_Nama">
<span<?php echo $t001_loket_list->Nama->viewAttributes() ?>><?php echo $t001_loket_list->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t001_loket_list->Alamat->Visible) { // Alamat ?>
		<td data-name="Alamat" <?php echo $t001_loket_list->Alamat->cellAttributes() ?>>
<span id="el<?php echo $t001_loket_list->RowCount ?>_t001_loket_Alamat">
<span<?php echo $t001_loket_list->Alamat->viewAttributes() ?>><?php echo $t001_loket_list->Alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_loket_list->ListOptions->render("body", "right", $t001_loket_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t001_loket_list->isGridAdd())
		$t001_loket_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t001_loket->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_loket_list->Recordset)
	$t001_loket_list->Recordset->Close();
?>
<?php if (!$t001_loket_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_loket_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_loket_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_loket_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_loket_list->TotalRecords == 0 && !$t001_loket->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_loket_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_loket_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_loket_list->isExport()) { ?>
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
$t001_loket_list->terminate();
?>