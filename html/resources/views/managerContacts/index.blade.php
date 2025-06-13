@yield('content')
    <h1>Contact Management</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('managerContacts.create') }}">New Manager Contact</a>

    <table border="1" cellpadding="5" cellspacing="0" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>
                      <a href="{{ route('managerContacts.show', $contact->id) }}">
                        {{ $contact->name }}
                      </a>
                    </td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('managerContacts.edit', $contact->id) }}">Edit</a>

                        <form action="{{ route('managerContacts.destroy', $contact->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Confirma exclusão?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; background:none; border:none; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No contact found.</td></tr>
            @endforelse
        </tbody>
    </table>
