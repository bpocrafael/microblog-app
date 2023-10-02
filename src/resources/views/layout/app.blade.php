<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
    <div>
        <main>
            @yield('content')
        </main>
    </div>
    @include('layout.scripts')
</body>
</html>