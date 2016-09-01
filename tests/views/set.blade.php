@set($four, 4)
@set($five, 5)
@set( $name, "Richard")
@set($elementsArray, [3,2,1])
@set($emptyArray, [ ])
@set($isTrue, true)

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel</title>
</head>
<body>
	<h2>{{$name}}</h2>

	<ul>
		<li>{{$five}}</li>
		<li>{{$four}}</li>
		@foreach($elementsArray as $element)
			<li>{{$element}}</li>
		@endforeach
	</ul>

	<p>
		@if(count($emptyArray) == 0)
			{{"No users found."}}
		@endif
	</p>

	@if($isTrue)
		<h3>Hello!</h3>
	@endif
</body>
</html>