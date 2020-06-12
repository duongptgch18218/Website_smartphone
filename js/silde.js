 var i = 0;
        var image = [];
        var time = 3000;;

        image[0] = 'image/3.jpg';
        image[1] = 'image/1.webp';
        image[2] = 'image/2.webp';
        image[3] = 'image/4.webp';
        
        function changeImage(){
            document.slide.src=image[i];
            
            if(i < image.length - 1 ){
                i++;
            }else{
                i = 0;
            }
            setTimeout("changeImage()",time);
        }
        
        window.onload = changeImage;