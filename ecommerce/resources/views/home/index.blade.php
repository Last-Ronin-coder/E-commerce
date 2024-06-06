<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    <!-- newspaper popup -->
    @include('home.news')

    <!-- header -->
    @include('home.header')

    <main>
        <!-- !banner -->
        @include('home.banner')

        <!--? Products and categories  -->
        @include('home.product')

        <!-- testimonial -->
        @include('home.testimonial')
    </main>

    <!-- footer -->
    @include('home.footer')

    <!-- js -->
    @include('home.js')
</body>

</html>