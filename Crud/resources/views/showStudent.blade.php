<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Show Students List
	</title>
</head>
<body>
	<div>
		<form action="{{url('searchStudent')}}" method="GET">
			<input type="search" name="search" placeholder="search name">
			<input type="submit" value="search"><br><br>
		</form>
		<table border="2">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Image</td>
				<td>Action</td>
			</tr>
			@foreach($data as $student)
			<tr>
				<td>{{$student->id}}</td>
				<td>{{$student->name}}</td>
				<td>{{$student->email}}</td>
				<td>{{$student->phone}}</td>
				<td>
					<img height="80" weight="80" src="student/{{$student->image}}">
				</td>
				<td>
					<a href="{{url('deleteStudent',$student->id)}}">Delete</a>
					<a href="{{url('update',$student->id)}}">Update</a>
				</td>
			@endforeach

			</tr>
		</table>
	</div>

</body>
</html>