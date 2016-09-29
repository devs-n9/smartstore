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
               @foreach($settings as $setting)
                <tr>
                  <td>{{ $setting->id }}</td>
                  <td>{{ $setting->description }}</td>
                  <td>{{ $setting->keywords }}</td>
                  <td>{{ $setting->author }}</td>
                  <td>{{ $setting->title }}</td>  
                   <td><a class="glyphicon glyphicon-pencil" href="/dashboard/settings/edit_meta/{{ $setting->id }}"></a></td>
                    <td><a class="glyphicon glyphicon-remove" href="/dashboard/settings/delete/{{ $setting->id }}"></a></td>
                </tr>
                @endforeach
        </tbody>
</table>
@endsection
