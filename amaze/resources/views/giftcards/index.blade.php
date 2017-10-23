@extends ('layouts.master')

@section ('content')

	<div class = "window text-centered rounded">

		<h1 class = "title">Card Search</h1>
		<div class = "big-space"></div>

		<form method="GET" action='/amaze/public/giftcards/search'>

	  		<div>

	  			<input class = "s-12 line rounded" type ="text" id = "number" name = "card_number" placeholder = "Card Number" required>
	  			<div class = "space"></div>

		  		<a href = '/amaze/public/giftcards/create' class = "s-6 inline-block btn left rounded-left" >Create</a
		  		><button class = "s-6 inline-block btn rounded-right" type="submit">Find</button>

	  			@include ('layouts.errors')

	  		</div>

		</form>

	</div>

@endsection