@extends('layouts.app', ['title' => 'Create Category'])

@section('content')
    <div class="section-header">
        <h1>Create Category</h1>
    </div>

    <div class="section-body">
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back to Category</a>
    </div>
@endsection
