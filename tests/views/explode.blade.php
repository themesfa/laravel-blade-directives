<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel</title>
</head>
<body>
	<ul>
		@foreach(@explode('|', "wine|cola|gin") as $drink)
			<li>{{$drink}}</li>
		@endforeach
	</ul>

	<ul>
		@foreach(@explode(',', "blue,red,green") as $color)
			<li>{{$color}}</li>
		@endforeach
	</ul>
</body>
</html>