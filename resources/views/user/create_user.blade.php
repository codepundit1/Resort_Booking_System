@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <h3>
                        User List
                        <a href="{{ url('view-user') }}"  class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">
                    <form action="store-user" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="name" aria-describedby="name">

                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">

                          </div>

                          <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="password">

                          </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
