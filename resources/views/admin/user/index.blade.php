@extends('layouts.admin.app', ['title' => 'User'])

@section('content')
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">User</div>
        </div>
    </div>

    <div class="section-body">
        @include('components.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Create User</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $result => $hasil)
                                        <tr>
                                            <td align="center" style="vertical-align: middle">{{ $result + $user->firstitem() }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->name }}</td>
                                            <td style="vertical-align: middle">{{ $hasil->email }}</td>
                                            <td align="center" style="vertical-align: middle">
                                                @if ($hasil->roles)
                                                    <span class="badge badge-info">Administrator</span>
                                                @else
                                                    <span class="badge badge-success">Penulis</span>
                                                @endif
                                            </td>
                                            <td align="center" style="vertical-align: middle">
                                                <form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
                                                    <a href="{{ route('user.edit', $hasil->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection