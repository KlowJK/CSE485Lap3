@extends('layout.parent')
@section('title', 'Chi tiết nhiệm vụ')
@section('main')

<h1 class="text-center text-dark">Chi tiết Nhiệm vụ</h1>
@if (session('success'))
<div class="container">
    <div class="alert alert-success  alert-dismissible" role="alert">
        {{ session('success') }}
        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="">
                <!-- Trending Tittle -->
                <div class="about-right  mb-90">
                    <div class="section-tittle mb-30 pt-30">
                        <h3>{{$task->title}}</h3>
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25 mt-4 "> {{$task->description}}</p>
                        <p class="about-pera1 mb-25">{{$task->long_description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-prea">
            <h5 class="mt-4"><strong>Trạng thái:</strong></h5>
            <p class="about-pera1 mb-25   {{ $task->completed == 1 ? 'text-success' : 'text-danger' }}"> {{ $task->completed == 1 ? 'Đã hoàn thành' : 'Chưa hoàn thành' }}</p>
        </div>
    </div>
</div>

<div class="container ">
    <div class="d-flex justify-content-center align-items gap-3 mt-5">
        <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-success sticky-bottom"><i class="bi bi-pencil-square"> Chỉnh sửa nhiệm vụ</i></a>
        <form action="{{route('tasks.updatecompleted',$task->id)}}" method="POST">
            @csrf
            @method('patch')
            <button type="submit" class="btn sticky-bottom {{$task->completed==1? 'btn-success':'btn-outline-danger' }}"> {{$task->completed==1? 'Đánh dấu chưa hoàn thành':'Đánh dấu đã hoàn thành' }}</button>
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$task->id}}">
            <i class="bi bi-trash3"></i> Xóa nhiệm vụ
        </button>
        <a href="{{ route('tasks.index') }}" class='btn btn-secondary'>Quay lại trang chủ</a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa nhiệm vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có muốn xóa nhiệm vụ này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form action="{{route('tasks.destroy',$task->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection