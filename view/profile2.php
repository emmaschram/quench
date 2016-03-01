<form id='myForm'>
    <input type='file' id='myfile' multiple />
    <button id='upload'>Upload</button>
</form>

<script>
    var upload = document.getElementById("upload");
    var files = document.getElementById("myfile");
    
    upload.onclick = function(e){
        //refreshes page
        e.preventDefault();
        
        //Upload the files using another form of ajax
        var formData = new FormData();
        
        var xhr = new XMLHttpRequest();
        
        var allfiles = files.files;
        console.log(allfiles);
        for(var i=0; i<allfiles.length; i++){
        
            //Get individual files with var
            var e_file = allfiles[i];
            
            if(!e_file.type.match("images/*")){
                alert("NO");  
                return false;
            }
            formData.append("images[]", e_file, e_file.name);
            formData.append("userid", 1);
            
            xhr.open("POST", "upload.php", true);
            
            xhr.onload = function(){
                if(xhr.status == 200){
                    alert("loaded properly");   
                }
            }
            
            xhr.send(formData);
        }
        
    }
</script>