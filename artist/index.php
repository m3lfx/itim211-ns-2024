<?php
require "../includes/header.php";
include "../includes/config.php";
?>

<body>

  <div class="container-fluid container-lg">
    <a class="btn btn-primary" href="create.php" role="button">Add Artist</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>artist ID</th>
          <th>Artist Name</th>
          <th>Country</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $result = mysqli_query($conn, "SELECT * FROM artists ORDER BY artist_id DESC");

        while ($row = mysqli_fetch_assoc($result)) {
          // var_dump($row);
          print "<tr>";
          echo "<td>" . $row['artist_id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['country'] . "</td>";
          
          echo "<td><img width='250' height='250' src= '{$row['img_path']}' alt='uploaded image' /></td>";
          echo "<td><a href=edit.php?id={$row['artist_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['artist_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
          print "</tr>";
        }

        ?>
      </tbody>
    </table>

  </div>
  <?php
  include "../includes/footer.php";
  ?>