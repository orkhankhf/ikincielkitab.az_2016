<?php
  $foto_url = $_GET['foto'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/jquery-ui.min.css">
  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/jquery-ui.min.js"></script>
  <script>
  $( function() {
    $( "#resizable" ).resizable().draggable();;
  } );
  </script>
  <style>
  .main img{
    position: absolute;
  }
  .main div{
    position: absolute;
    background: gray;
    opacity: 0.4;
  }
  form{
    position: relative;
  }
  #resizable{
    width: 150px;
    height: 150px;
    padding: 0.3em;
  }
  </style>
</head>
<body>
<div class="ui-widget-content main">
  <img src="../../../book_images/<?php echo $foto_url; ?>.jpg" class="ui-widget-header">
  <div id="resizable"></div>
</div>
<form action="resize_save.php" method="post" onsubmit="return checkCoords();">
  <input type="hidden" id="x" name="x" />
  <input type="hidden" id="y" name="y" />
  <input type="hidden" id="w" name="w" />
  <input type="hidden" id="h" name="h" />
  <input type="hidden" name="foto" value="<?php echo $foto_url; ?>" />
  <input type="submit" value="Yadda Saxla" />
</form>

 <script type="text/javascript">
  $("#resizable").mouseup(function(){
    var div = $( ".main div" );
    var yeri = div.position();
    $("#x").val(yeri.left);
    $("#y").val(yeri.top);
    $("#w").val(div.width());
    $("#h").val(div.height());
  })
 </script>
 
</body>
</html>