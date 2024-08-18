@if (session('success'))
    <div class="toast toast-start z-20">
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    </div>
@endif
@if (session('error'))
    <div class="toast toast-start z-20">
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    </div>
@endif
