@extends('layout.parent')
@section('title', 'Nhiệm vụ hàng ngày')
@section('username' ,$name)
@section('main')
<h3 class="text-center text-uppercase text-success my-3">Danh sách Nhiệm vụ</h3>
<a href="{{route('tasks.create')}}" class='btn btn-success ms-1'><i class="bi bi-plus-circle"></i> Thêm nhiệm vụ mới</a>
@if (session('success'))
<div class="container">
    <div class="alert alert-success  alert-dismissible" role="alert">
        {{ session('success') }}
        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col" class="">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td scope="col">
                {{ $loop->iteration + ($tasks->currentPage() - 1) * $tasks->perPage() }}
            </td>
            <td scope="col">{{$task->title}}</td>
            <td scope="col" class="{{ $task->completed == 1 ? 'text-success' : 'text-danger' }}">

                {{ $task->completed == 1 ? 'Đã hoàn thành' : 'Chưa hoàn thành' }}

            </td>
            <td scope="col">{{$task->created_at}}</td>
            <td scope="col">
                <a href="{{route('tasks.show',$task->id)}}" class="btn btn-success"><i class="bi bi-eye"> Chi tiết</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center ">
    {{ $tasks->links() }}
</div>
@endsection