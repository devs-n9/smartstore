@extends('layouts.dashboard')
@section('content')
<a class="btn btn-success" href="/dashboard/settings/add_contacts">Add new contacts</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
        <th>ID</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->address }}</td>
        <td><a class="glyphicon glyphicon-pencil" href="/dashboard/settings/edit_contacts/{{ $contact->id }}"></a></td>
        <td><a class="glyphicon glyphicon-remove" href="/dashboard/settings/index_contacts/delete_contacts/{{ $contact->id }}"></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
