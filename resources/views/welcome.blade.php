
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('login.post') }}">
    @csrf <input type="text" name="username" class="form-control"
        value="{{ request()->cookie('username') ?? '' }}" required>
...