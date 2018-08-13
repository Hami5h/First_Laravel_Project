@extends('layouts.admin')

@section('content')

  @if(Session::has('deleted_image'))

  <p class="bg-danger">{{session('deleted_image')}}</p>

  @endif

  <h1>Media</h1>

  @if($photos)

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created date</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="{{$photo->file}}" alt=""></td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
            <td>
              {!! Form::open(['method' => 'DELETE',
                'action' => ['AdminMediasController@destroy', $photo->id]]) !!}

                <div class="form-group">
                  {!! Form::submit('Delete Image', ['class' => 'btn btn-danger col-sm-6']) !!}
                </div>

                {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  @endif

@stop
