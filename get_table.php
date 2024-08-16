<?php 
  require_once("services/database.php");

  $query_select_table = "SELECT * FROM tables";
  $selected_table = $db->query($query_select_table);

  foreach ($selected_table as $table) {
?>
<div class="h-48 text-center content-center rounded-md mx-2 my-2 hover:cursor-pointer hover:scale-105 transition duration-0 ease-in-out hover:duration-150 shadow-md <?php echo $table['customer_name'] == NULL && $table['amount_people'] == NULL ? 'bg-indigo-600' : 'bg-red-600'; ?> text-white">
  <p class="font-semibold"><?= $table['table_type'] . " " . $table['table_number']?></p>
  <p><?= $table['customer_name'] == NULL && $table['amount_people'] == NULL ? "Meja Tersedia" : "Atas nama " . $table['customer_name'] . " " . $table['amount_people'] . " Orang"?></p>
</div>
<?php } ?>