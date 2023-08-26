@extends('templates.TemplateAdmins.master')
@section('title', 'major list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">Majors List</h2>
        <a class="btn btn-danger mb-5" href="{{ route('majors.create') }}">Create New Major</a>

        @if (session()->has('success'))
            <div class="px-1 py-1 mt-2 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">

                @isset($majors)
                    @forelse ( $majors as $major )
                        <tr>
                            <td>{{ $major->id }}</td>
                            <td>{{ $major->title }}</td>
                            <td>
                            <img src="{{ url("admin/assets/images/majors/$major->img") }}" alt="" width="100" height="100">
                            </td>
                            <td>{{ $major->created_at }}</td>
                            <td>
                            <a href="{{ route('majors.edit', $major->id) }}" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                            <form action="{{ route('majors.destroy', $major->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger custom-btn" value="delete">
                            </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">There is no majors yet</div>
                    @endforelse
                @endisset

            </tbody>
        </table>

        </div>

        </div>
    </div>
    </div>
    </div>
<!-- End Main Body -->
@endsection
