<!DOCTYPE html>
<html>
	<head>
		<title>Send mail</title>
	</head>

	<body>
		<form id="sendmail" method="POST">
			<input type="email" name="email" placeholder="Enter desired email"> <br><br>
			<textarea name="message" placeholder="Write your message"></textarea> <br><br><br>
			<button type="submit">Send mail</button>
		</form>

		<script
		  src="https://code.jquery.com/jquery-3.5.1.min.js"
		  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		  crossorigin="anonymous"></script>
		<script>
			$('#sendmail').submit(function(e){
			  (e).preventDefault();

			    $.ajax({
			      url: 'sendmail.php?task=mail',
			      type: 'POST',
			      dataType: 'json',
			      data: $(this).serialize()
			    })
			    .done(function(response){
			      if(response.status == 1){
			        alert(response.message);
			        location.href = './';
			      }
			      else{
			        alert(response.message);
			      }
			    });
			});
		</script>
	</body>
</html>