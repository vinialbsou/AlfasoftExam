
@yield('content')
    <h1>New Manager Contact</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('managerContacts.store') }}" method="POST">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Contact:</label><br>
        <input type="text" name="contact" value="{{ old('contact') }}" maxlength="9" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <button type="submit">Save</button>
        <a href="{{ route('managerContacts.index') }}">Cancel</a>
    </form>
@endyield
