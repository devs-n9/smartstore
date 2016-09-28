@extends('layouts.dashboard')
@section('content')
<a class="btn btn-success" href="/dashboard/settings/add_settings">Add new contacts</a>
    
    <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $contacts->id }}</td>
                  <td>{{ $contacts->phone }}</td>
                  <td>{{ $contacts->email }}</td>
                  <td>{{ $contacts->address }}</td>
                   <td><a class="glyphicon glyphicon-pencil" href="/dashboard/settings/edit_contacts/{{ $contacts->id }}"></a></td>
                </tr>
        </tbody>
</table>
@endsection
