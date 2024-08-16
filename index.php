<?php
  require_once("services/database.php");
  define("APP_NAME", "REV RESTAURANT");

  $update_msg = "";

  $query_select_table = "SELECT * FROM tables";
  $selected_table = $db->query($query_select_table);

  if (isset($_POST['simpan'])) {
    $pilih_meja = $_POST['pilih_meja'];
    $cs_name = $_POST['cs_name'];
    $cs_amount = $_POST['cs_amount'];

    $query_pilih_meja = "UPDATE tables SET customer_name='$cs_name', amount_people='$cs_amount' WHERE table_number LIKE '$pilih_meja'";
    
    if($db->query($query_pilih_meja)){
      $update_msg = "Pesanan berhasil";
    } else {
      $update_msg = "Pesanan gagal";
    }
  }

  if (isset($_POST['hapus'])) {
    $cs_name = NULL;
    $cs_amount = NULL;

    $query_hapus_meja = "UPDATE tables SET customer_name=NULL, amount_people=NULL";

    if($db->query($query_hapus_meja)){
      $update_msg = "Hapus pesanan berhasil";
    } else {
      $update_msg = "Hapus pesanan gagal";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <title> <?= APP_NAME ?> </title>
</head>
<body>
  <h1 class="w-full h-12 mb-4 content-center text-center bg-indigo-600 text-white font-bold text-2xl">DAFTAR MEJA</h1>
  <div class="w-full flex">
    <div id="view_pilih_meja" class="w-3/4 mx-auto grid grid-cols-2 gap-2 border">
      
    </div>
    <div class="w-1/4 mx-4 px-4 py-2 border">
      <div class="w-3/4 mx-auto">
        <p class="text-xl font-semibold mb-4 text-center">Update Meja</p>
        <form action="" method="POST">
          <label for="">Pilih meja :</label><br>
          <div id="ar_pilih_meja">
          </div>
            <div class="mt-2 mb-2">
              <label for="">Nama Customer :</label><br>
              <input type="text" name="cs_name" class="border rounded-md shadow-sm px-2">
            </div>
            <div class="mb-4">
              <label for="">Jumlah Customer :</label><br>
              <input type="number" name="cs_amount" class="border rounded-md shadow-sm px-2">
            </div>
            <div class="">
              <button type="submit" name="simpan" class="border px-2 bg-indigo-600 rounded-md text-white">
                simpan
              </button>
              <button type="submit" name="hapus" class="border px-2 bg-red-600 rounded-md text-white">Hapus Pesanan</button>
            </div>
        </form>
        <i><?= $update_msg ?></i>
      </div>
    </div>
  </div>

  <script>
    function refresh_pilih_meja() {
      $.ajax({
        url: 'get_table.php',
        method: 'GET',
        success: function(data){
          $('#view_pilih_meja').html(data);
        },
        error: function(xhr, status, error){
          console.error('Error:', error);
        }
      });
    }
    function refresh_list_meja(){
      $.ajax({
        url: 'get_list_table.php',
        method: 'GET',
        success: function(data){
          $('#ar_pilih_meja').html(data);
        },
        error: function(xhr, status, error){
          console.error('Error:', error);
        }
      });
    }
    $(document).ready(function(){
      refresh_pilih_meja();
      refresh_list_meja();
    });
  </script>
</body>
</html>