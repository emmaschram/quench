<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="./css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./css/my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
        
        <section class='loginsection'>
            <img id='logo' src='img/quenchlogo.png'/>
            <br/><br/><br/><br/>
            <input type="text" id="username" placeholder="Username"/><br/>
            <input type="password" id="password" placeholder="Password"/><br/>
            <button type="submit" id='sub'>Login</button><br/><br/><br/>
            <span>Don't have an account? <a href="#/register">Sign Up</a></span>
        </section>
        
    </body>
    
    <script>
      $(document).ready(function(){
            //var user_id = 1;
            document.getElementById('sub').onclick = function(){
            $.ajax({
               url:"model/loggingin.php",
                type:"POST",
                dataType:"json",
                data: {
                    username: document.getElementById('username').value,
                    password: document.getElementById('password').value
                },
                success:function(resp){
                    alert("Logged in!");
                    window.location.replace("#/feed");
                    user_id = resp[0].id;

                },
                error: function (resp){
                    alert("error");
                }
            });
            
            }
            
        });

        
    </script>    

</html>
