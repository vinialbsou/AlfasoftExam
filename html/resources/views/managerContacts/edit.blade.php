
@yield('content')
    <h1>Edit Manager Contact</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('managerContacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $contact->name) }}" required><br><br>

        <label>Contact:</label><br>
        <input type="text" name="contact" maxlength="9" value="{{ old('contact', $contact->contact) }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $contact->email) }}" required><br><br>

        <button type="submit">Update</button>
        <a href="{{ route('managerContacts.index') }}">Cancel</a>
    </form>
