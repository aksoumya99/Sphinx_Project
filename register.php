<!DOCTYPE html>
<html>
<head>
  <title>SPHINX</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <div class="login-page">
  <div class="form" >
    <form class="register-form" method="GET" action="reg_connect.php">
      <h1 align="center" id="m1">REGISTER</h1>
      <div align="left" style="margin-bottom: 10px">
        <strong>Register With Facebook:      </strong>
        <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '418522018720169',
        cookie     : true,
        xfbml      : true,
        version    : 'v3.2'
      });
        
      
      // FB.getLoginStatus(function(response) {
      //     statusChangeCallback(response);
      // });
        
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
    function statusChangeCallback(response){
      if(response.status === 'connected'){
        console.log('Logged in and authenticated');
        setElements(true);
        testAPI();
      } else {
        console.log('Not Authenticated');
        setElements(false);
      }
    }

    function checkLoginState() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
      });
    }
    function testAPI(){
      FB.api('/me?fields=name,email', function(response){
        if(response && !response.error){
          console.log(response);
          buildProfile(response);
        }
      })
    }
    function buildProfile(user){
      // let profile= `
      // <h3>${user.name}</h3>`;
      // document.getElementById("demo").innerHTML= profile;
      var un= `${user.name}`;
      var uem= `${user.email}`;
      window.location.href = "regtemp.php?name=" + un +"&email="+ uem;
    }
    function setElements(isLoggedIn){
      if(isLoggedIn){
        //document.getElementById('logout').style.display = 'block';
        // document.getElementById('profile').style.display = 'block';
        // document.getElementById('fb-btn').style.display = 'none';
      } else {
        //document.getElementById('logout').style.display = 'none';
        // document.getElementById('profile').style.display = 'none';
        // document.getElementById('fb-btn').style.display = 'block';
      }
    }
    function logout(){
      FB.logout(function(response){
        setElements(false);
      });
    }
  </script>

    <fb:login-button 
      scope="public_profile,email"
      onlogin="checkLoginState();">Register</fb:login-button>
          
        </div>
        <input type="text" placeholder="First Name" name="fname"/>
        <input type="text" placeholder="Last Name" name="lname"/>
        <input type="text" placeholder="User Name" name="username"/>

        <input type="password" placeholder="password" name="password"/>
        <input type="number" placeholder="Mobile Number" name="mob_no">
        <input type="email" name="email" placeholder="Email Address"> 
       
        <button type="submit" value="submit">Create</button>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
      </form>


  </div>
</div>
</body>
</html>