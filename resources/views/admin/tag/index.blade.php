@extends('layouts.app', ['title' => 'Tag'])

@section('content')
    <div class="section-header">
        <h1>Tag</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/home">Dashboard</a></div>
            <div class="breadcrumb-item">Tag</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('tag.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create Tag</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tag</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tag as $result => $hasil)
                                        <tr>
                                            <td>{{ $result + $tag->firstitem() }}</td>
                                            <td>{{ $hasil->name }}</td>
                                            <td>
                                                <form action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('tag.edit', $hasil->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yaknin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $tag->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection