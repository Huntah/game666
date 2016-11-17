<!DOCTYPE html>
<!-- Map Test -->
<html>
<body onload='drawMap()'>
<?PHP
 
?>
<!-- JS Functions -->
    <script type="text/javascript">
   
        function drawMap() {
            var maxBorder = 16;
            var imageWidth = 150;
            var imageHeight = 75;
			var offSetx=1200;
           
            var mainCanvas = document.getElementById('CanvasDiv');
            context = mainCanvas.getContext('2d');
           
            image_grass = new Image();
            image_grass.src = 'grass.png';
           
            image_grass.onload = function() {
                for(i = 0;i < (maxBorder*imageWidth);i+=imageWidth) {
                    for(j = 0;j < (maxBorder*imageHeight);j+=imageHeight) {
                        var coordX = (((i*2 - j * 4)) / 4)+offSetx;
                        var coordY = ((i*2 + (j * 4)) / 2) / 4;
                        context.drawImage(image_grass,coordX,coordY,imageWidth,imageHeight);
                        console.log(j);
                    }
                }
            }
        }
       
    </script>
 
    <canvas id='CanvasDiv' width='3000' height='3000'>
        stuff
    </canvas>
</body>
</html>