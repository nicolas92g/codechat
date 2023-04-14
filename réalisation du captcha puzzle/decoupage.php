<?php
$originalImage = imagecreatefromjpeg('image_test.jpeg');
$originalWidth = imagesx($originalImage);
$originalHeight = imagesy($originalImage);

$partWidth = $originalWidth / 3;
$partHeight = $originalHeight / 2;

$parts = array();
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 2; $j++) {
        
        $part = imagecreatetruecolor($partWidth, $partHeight);

        imagecopy($part, $originalImage, 0, 0, $i * $partWidth, $j * $partHeight, $partWidth, $partHeight);

        $parts[] = $part;
    }
}

foreach ($parts as $index => $part) {
    imagejpeg($part, "image_test".($index+1).".jpg", 100);
}

echo"<img src='image_test1.jpg' >";
echo"<img src='image_test2.jpg' >";
echo"<img src='image_test3.jpg' >";
echo"<img src='image_test4.jpg' >";
echo"<img src='image_test5.jpg' >";
echo"<img src='image_test6.jpg' >";
?>
