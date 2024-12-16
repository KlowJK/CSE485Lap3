@extends('layout.parent')
@section('title', 'Chỉnh sửa bài viết')
@section('main')
<div class="container mt-5">
    <h3 class="text-center text-uppercase text-success my-3">Chỉnh sửa bài viết </h3>
    <form method="post" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" id="title" name="title" class="form-control" value="{{$task->title}}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <input type="description" id="description" name="description" class="form-control" value="{{$task->description}}" required>
        </div>
        <div class="mb-3">
            <label for="long_description" class="form-label">Mô tả chi tiết</label>
            <textarea id="long_description" name="long_description" class="form-control" required>{{$task->long_description}}</textarea>

        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('tasks.index') }}" class='btn btn-secondary'>Quay lại trang chủ</a>
    </form>
</div>
@endsection