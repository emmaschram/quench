
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="./css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./css/my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
         
        <section class='loginsection'>
            
            <img id='logo' src='img/quenchlogo.png'/>
            <br/><br/><br/><br/>
            
            <input type='text' id='email_r' placeholder='Email'/><br/>
            <input type="text" id="username_r" placeholder="Username" /><br/>
            <input type="password" id="password_r" placeholder="Password"/><br/>
            <input type="password" id='c_password_r' placeholder='Confirm Your Password'/><br/>
            <button type="submit" id="sub">Register</button><br/><br/><br/>

            <div  id="errormsg">
            <p id="signerror"></p>
            <p  id="success"></p>
            <div  id="errormsg">
        <p id="signerror"></p>
        <p  id="success"></p>

        </div>
           
            <span>Already have an account? <a href="#/login">Login</a></span>
            
        </section>
        

        <!--<input type='text' id='title' placeholder='title' />
        <input type='text' id='path' placeholder='path' /> 
        <button id='submit'>Submit</button> -->
        
    </body>

    <script>
       $(document).ready(function(){
            
            document.getElementById('sub').onclick = function(){
           //connect and insert 
            $.ajax({
               url:"controller/register.php",
                type:"post",
                dataType:"html",
                data: {
                    method:"insert",
                    email: document.getElementById('email_r').value,
                    username: document.getElementById('username_r').value,
                    password: document.getElementById('password_r').value
                },
                success:function(resp){
                    //alert("INSERT!");
                    window.location = '#/login';
                }
            });
            
            }
            
        });

    </script>
        
        
    <!-- <script src="./js/register_val.js"></script> -->
</html>

