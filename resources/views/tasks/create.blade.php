@extends('layout.parent')
@section('title','Thêm nhiệm vụ')
@section('main')

<div class="container mt-5">
    <h3 class="text-center text-uppercase text-success my-3">Thêm nhiệm vụ mới</h3>

    <form method="post" action="{{route('tasks.store')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" id="title" name="title" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <input type="description" id="description" name="description" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="long_description" class="form-label">Mô tả chi tiết</label>
            <textarea id="long_description" name="long_description" class="form-control" required></textarea>

        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('tasks.index') }}" class='btn btn-secondary'>Quay lại trang chủ</a>



    </form>
</div>
@endsection