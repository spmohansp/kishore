@include('master.header')
@yield('style')
<div class="o-page">
    @include('hub.layout.navigation')
    <main class="o-page__content">
        @include('hub.layout.header')
        <div class="container">

           @include('master.errors')

            @yield('content')


        </div>
    </main>
</div>
@include('master.footer')