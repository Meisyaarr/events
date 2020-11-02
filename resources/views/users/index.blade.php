@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex">
        <div class="col-md-10">
            <div class="card border-0">
                <div class="card-body">
                    <div class="mb-2 pt-2">
                        <a href="{{route('users.kegiatan.index')}}" class="btn btn-info">Add New User</a>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Meisya</td>
                                    <td>meiii@gmail.com</td>
                                    <td>Siswa</td>
                                    <td>
                                    <form action="">
                                        <a href="http://" class="btn btn-sm btn-info"></a>
                                        <button href="http://" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection