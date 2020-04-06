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
<div class="card" style="width: 18rem;">
	<div class="card-header">Sub Total</div>
	<div class="card-body">
<?php
$q = "select loket_id as 'Loket_ID', b.Kode, b.Nama, sum(Jumlah) as 'Sub Total' from t101_pembayaran a left join t001_loket b on a.loket_id = b.id group by a.loket_id";
echo ExecuteHtml($q, ["fieldcaption" => TRUE, "tablename" => ["t101_pembayaran", "t001_loket"]]); // Execute a SQL and show as HTML table
?>
	</div>
</div>

<div class="card" style="width: 18rem;">
	<div class="card-header">Total</div>
	<div class="card-body">
<?php
$sql = "select sum(Jumlah) as 'Total Pemasukan' from t101_pembayaran";
echo ExecuteHtml($sql, ["fieldcaption" => TRUE, "tablename" => ["t101_pembayaran"]]); // Execute a SQL and show as HTML table
?>
	</div>
</div>

<!--
<div class="card" style="width: 18rem;">
  <div class="card-header">
	Featured
  </div>
  <ul class="list-group list-group-flush">
	<li class="list-group-item">Cras justo odio</li>
	<li class="list-group-item">Dapibus ac facilisis in</li>
	<li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>
-->

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c201_home->terminate();
?>