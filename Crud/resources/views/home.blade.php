<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	<div>
		<form action="{{url('uploadStudent')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<label>Name : </label>
			<input type="text" name="name"><br>

			<label>Email : </label>
			<input type="text" name="email"><br>

			<label>Phone : </label>
			<input type="text" name="phone"><br>

			<input type="file" name="file"><br>

			<input type="submit">

		</form>
	</div>

</body>
</html>