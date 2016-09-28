@extends('layouts.dashboard')
@section('content')
<a class="btn btn-success" href="/dashboard/settings/add_settings">Add new contacts</a>
    
    <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Description</th>
                  <th>Keywords</th>
                  <th>Author</th>
                  <th>Title</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $settings->id }}</td>
                  <td>{{ $settings->description }}</td>
                  <td>{{ $settings->keywords }}</td>
                  <td>{{ $settings->author }}</td>
                  <td>{{ $settings->title }}</td>  
                   <td><a class="glyphicon glyphicon-pencil" href="/dashboard/settings/edit_meta/{{ $setings->id }}"></a></td>
                    <td><a class="glyphicon glyphicon-remove" href="/dashboard/settings/delete/{{ $settings->id }}"></a></td>
                </tr>
        </tbody>
</table>
@endsection
