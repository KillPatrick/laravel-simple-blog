<!DOCTYPE html>
<html lang="en">
<head>
    @include('user/layouts/head')
</head>
<body>
    @include('user/layouts/nav')
    @include('user/layouts/header')

    @section('main-content')
        @show

    @include('user/layouts/footer')
    @include('user/layouts/scripts')
</body>
</html>