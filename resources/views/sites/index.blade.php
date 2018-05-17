@extends('layouts.app')

@section('content')

<table class="table table-hover">
    @foreach ($sites as $site)
        <tr>
            <td>
                <a href="{{route('sites.show', $site)}}">
                    {{$site->title}}
                </a>
                </td>
            <td>
                {{$site->description}}
            </td>
             <td>
                <form action="/delete_site/{{$site->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button>Delete site</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
    
@endsection