<?php 
  require_once("services/database.php");

  $query_select_table = "SELECT * FROM tables";
  $selected_table = $db->query($query_select_table);
?>
<select name="pilih_meja" class="border rounded-md w-2/4 px-1 shadow-sm border-indigo-600">
  <?php foreach ($selected_table as $table) { 
      if($table['customer_name'] == NULL && $table['amount_people'] == NULL){ 
  ?>
  <option value="<?= $table['table_number']?>"><?php echo $table['table_type'] . " " . $table['table_number'];}?></option>
  <?php } ?>
</select>