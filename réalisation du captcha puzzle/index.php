<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAPTCHA</title>
 <link rel="stylesheet" href="puzzle.css">
 <script src="puzzle.js"></script>
</head>
<body>
    <h1>captcha</h1>
   

    
  <?php
     echo " <p><img src='image_test.jpeg' ></p> ";
  ?>
  <?php
$originalImage = imagecreatefromjpeg('image_test.jpeg');
$originalWidth = imagesx($originalImage);
$originalHeight = imagesy($originalImage);

$partWidth = $originalWidth / 3;
$partHeight = $originalHeight / 3;

$parts = array();
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $part = imagecreatetruecolor($partWidth, $partHeight);
        imagecopy($part, $originalImage, 0, 0, $i * $partWidth, $j * $partHeight, $partWidth, $partHeight);
        $parts[] = $part;
    }
}


shuffle($parts);

foreach ($parts as $index => $part) {
    imagejpeg($part, "image_test".($index+1).".jpg", 100);
}

?>
<div id="board">
    <?php   
    echo '<img src="image_test1.jpg" >'; // ajout d'un attribut onclick pour appeler la fonction swapImages()
    echo '<img src="image_test2.jpg" ">';
    echo '<img src="image_test3.jpg" ">';
    echo '<img src="image_test4.jpg" >';
    echo '<img src="image_test5.jpg" >';
    echo '<img src="image_test6.jpg" >';
    echo '<img src="image_test7.jpg" >';
    echo '<img src="image_test8.jpg" >';
    echo '<img src="image_test9.jpg" >';
    ?>
</div>




</body>
</html>
