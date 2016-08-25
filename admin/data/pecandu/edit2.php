<?php



$s = "UPDATE pecandu SET status=1";
  $s .= " WHERE id_pecandu='$_GET[id]'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data Pecandu Tidak Diterima');</script>";
    header("Refresh: 0; URL=?p=pecandu");
  }

