<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Student</title>
</head>
<body>
	<div>
		<form action="{{url('update_student',$student->id)}}" method="POST" enctype="multipart/form-data">
		@csrf 
			<img height="80" weight="80" src="/student/{{$student->image}}"><br>
			<label>Change picture</label><br>
			<input type="file" name="file"><br>
			<label>Name : </label>
			<input type="text" name="name" value="{{$student->name}}"><br>
			<label>Email : </label>
			<input type="text" name="email" value="{{$student->email}}"><br>
			<label>Phone : </label>
			<input type="text" name="phone" value="{{$student->phone}}"><br>
			<input type="submit" value="Update">

		</form>
	</div>

</body>
</html>