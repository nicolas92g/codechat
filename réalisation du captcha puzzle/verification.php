<?php
  $solution = array(1, 2, 3, 4, 5, 6);
  $submitted = array();
  foreach ($_POST as $key => $value) {
    if (substr($key, 0, 5) === "piece") {
      $submitted[] = substr($key, -1);
    }
  }
  if ($submitted === $solution) {
    echo "Puzzle solved!";
  } else {
    echo "Puzzle not solved.";
  }
?>