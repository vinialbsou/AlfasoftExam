@extends('layouts.app')

@section('content')
    <h1>Manager Contact Details</h1>

    <p><strong>ID:</strong> {{ $contact->id }}</p>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Contact:</strong> {{ $contact->contact }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>

    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>

    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Confirm?');">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red; background:none; border:none; cursor:pointer;">Delete</button>
    </form>

    <br><br>
    <a href="{{ route('contacts.index') }}">Return</a>
@endsection
