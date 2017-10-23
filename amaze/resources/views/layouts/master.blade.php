<html>

<head>

    <title>Amaze Cards</title>

    <link href="{{ asset('/css/global.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>

</head>

<body>

	@include ('partials.navbar')


	@yield('content')

</body>

</html>