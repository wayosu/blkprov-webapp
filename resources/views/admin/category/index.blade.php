@extends('layouts.app', ['title' => 'Category'])

@section('content')
    <div class="section-header">
        <h1>Blank Page</h1>
    </div>

    <div class="section-body">
        <ul>
            @foreach ($category as $result)
                <li>{{ $result->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
