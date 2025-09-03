<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce Website</title>
    @include('includes.style')
</head>
<body>
	@include('includes.header')

    <main>
        @yield('content')
    </main>
    
	@include('includes.footer')

    @include('includes.script')

    @stack('script')
</body>
</html>