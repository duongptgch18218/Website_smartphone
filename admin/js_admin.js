function takeData(cate){
            var getidHtml = new XMLHttpRequest();
            getidHtml.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            getidHtml.open("GET","read.php?cate="+cate,true);
            getidHtml.send();
            
        }
        
        function deleteData(id){
           
            var deleteHtml = new XMLHttpRequest();
            deleteHtml.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            deleteHtml.open("GET","delete.php?id="+id,true);
            deleteHtml.send();
        }
         function search_admin(){
             
            
            var search = document.getElementById("search").value;
            
            var searchHtml = new XMLHttpRequest();
            searchHtml.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            searchHtml.open("get", "search-admin.php?search="+search,true);
            searchHtml.send();   
        }
function search_admin1(){
         var search = document.getElementById("search").value;
            window.location="admin.php?search="+search;
    }
