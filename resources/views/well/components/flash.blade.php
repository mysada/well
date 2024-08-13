@vite('resources/sass/flash.scss')
@vite('resources/js/flash.js')
@if (session('success'))
<div class="alert alert-success" id="flash-message">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger" id="flash-message">
    {{ session('error') }}
</div>
@endif


