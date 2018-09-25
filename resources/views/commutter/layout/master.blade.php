@include('master.header')
@yield('style')
<div class="o-page">
    @include('commutter.layout.navigation')
    <main class="o-page__content">
        @include('commutter.layout.header')
        <div class="container">

           @include('master.errors')

            @yield('content')

        </div>
    </main>
</div>
@include('master.footer')