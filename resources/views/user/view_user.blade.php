@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>
                            User List <span> </span>
                            <span class="mr-3"><a class="btn btn-primary btn-sm float-end"
                                    href="{{ url('add-user') }}">Add User</a></span> <a href="{{ url('home') }}"
                                class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SI.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>


                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user->deleted_at ? 'Inactive' : 'Active' }}</td>
                                <td>
                                    @if ($user->deleted_at)
                                        <a title="Restore" class="btn btn-success btn-sm px-3"
                                            href={{ 'restore-user/' . $user['id'] }}><i
                                                class="fas fa-trash-restore"></i></a>

                                        <a title="Delete" class=" px-3 btn btn-danger btn-sm "
                                            href="{{ route('user.force-delete', $user->id) }}">
                                            <i class="fa fa-trash "></i></a>
                                    @else
                                        <a title="Trash" class="btn btn-warning btn-sm px-3"
                                            href={{ 'delete-user/' . $user['id'] }}><i class="fa fa-trash "></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <span>
                {{ $users->links() }}
            </span>
        </div>
    </div>
@endsection
