@extends('layouts.app') {{-- INSERT INTO `services`(`id`, `name_service`, `price_service`, `type_settlement`, `created_at`,
`updated_at`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6]) --}} @section('content')
<h1>Servisy</h1>
<br /> @if (\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
</div>
<br /> @endif
<table class="table table-hover">
    @foreach ($services as $service)
    <tr>
        <td>
            {{$service->name_service}}
        </td>
        <td>
            {{$service->price_service}}
        </td>
        <td>
            {{$service->type_settlement}}
        </td>
        <td>
            <a href="{{action('ServiceController@edit', $service->id)}}" class="btn btn-info">Edit</a>
        </td>
        <td>
            <form action="/services/{{$service->id}}" method="post">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <button class="btn btn-danger">Delete service</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection