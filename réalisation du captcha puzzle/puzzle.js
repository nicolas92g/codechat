var rows = 3;
var columns = 2;

var currTile;
var othertile;
var turns = 0;
var imgOrder = ["image_test1","image_test2","image_test3","image_test4","image_test5","image_test6","image_test7","image_test8","image_test9",];
 
window.onload = function(){
  for (let r=0; r < rows; r++) {
    for (let c=0; c < columns; c++){

      let tile = documet.createElement("image")
      tile.id = r.toString() + "-" + c.toString();
      tile.src = imgOrder.shift() + "jpg";

    }
  }
}