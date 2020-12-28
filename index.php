<!DOCTYPE html>
<html>
	<head>
		<title>Send mail</title>
	</head>

	<body>
		<form id="sendmail" method="POST">
			<input type="email" name="email" placeholder="Enter desired email"> <br><br>
			<textarea placeholder="Write your message"></textarea> <br><br><br>
			<button type="submit">Send mail</button>
		</form>

		<script type="text/javascript">
			$('#bookS').submit(function(e){
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