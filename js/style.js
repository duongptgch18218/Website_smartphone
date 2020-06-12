 function takeData(cate){
            
            var getidHtml = new XMLHttpRequest();
            getidHtml.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("row").innerHTML = this.responseText;
                }
            }
            getidHtml.open("GET","read.php?cate="+cate,true);
            getidHtml.send();
            
        }

function search(){
            
            var search = document.getElementById("search").value;
            
            var searchHtml = new XMLHttpRequest();
            searchHtml.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById("row").innerHTML = this.responseText;
                }
            }
            searchHtml.open("get", "search.php?search="+search,true);
            searchHtml.send();   
        }

function search1(){
           var search = document.getElementById("search").value;
            window.location="index.php?search="+search;
        }

function search1(){
         var search = document.getElementById("search").value;
           
        
    }
        
function confirm(){
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            if(name == "" || phone == "" || address == ""){
                alert("Information not enought, please check again");
            }else{
                alert("Thank '"+ name + "'for purchasing the product,We will send the product to you as soon as possible. Wish you a good day ");
                 window.location="index.php";
            }
            
            
        }
        
        


        

        