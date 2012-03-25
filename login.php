<?php 
	include('config.php');
?>

<html>
	<head>
		<title>My Facebook Login Page</title>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId      : <?php echo($fb_appid); ?>,
					status     : true, 
					cookie     : true,
					xfbml      : true,
					oauth      : true,
				});
	
          FB.api('/me', function(user) {
            if (user) {
              var image = document.getElementById('image');
              image.src = 'http://graph.facebook.com/' + user.id + '/picture';
              var name = document.getElementById('name');
              name.innerHTML = user.name
            }
          });
        };

			(function(d){
				var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
				js = d.createElement('script'); js.id = id; js.async = true;
				js.src = "//connect.facebook.net/en_US/all.js";
				d.getElementsByTagName('head')[0].appendChild(js);
			}(document));
		</script>

<!--		<div class="fb-login-button">Login with Facebook</div> -->

		<div align="center">
			<img id="image"/>
			<div id="name"></div>
		</div>
	</body>
</html>
