<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
 $characters = array(
    array(
      "name" => "bob",
      "occupation" => "superhero",
      "age" => 30,
      "specialty" => "x-ray vision",
    ),
    array(
      "name" => "sally",
      "occupation" => "superhero",
      "age" => 24,
      "specialty" => "superhuman strength"
    ),
    array(
      "name" => "mary",
      "occupation" => "arch villain",
      "age" => 63,
      "specialty" => "nanotechnology"
    )
  );
//    print_r($characters);
   foreach ($characters as $character) {
      foreach ($character as $key => $value) {
        print $value . "<br>";
      }
    }

    $first = array("a", "b", "c");
    $second = array(1, 2, 3);
    $third = array_merge($first, $second);
    foreach ($third as $val) {
      print "$val<BR>";
    }
    ?>
</body>

</html>