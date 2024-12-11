@extends('layout.parent')
@section(['title' => 'Nhiệm vụ hàng ngày'])
@section('main')
<h3 class="text-center text-uppercase text-success my-3">Danh sách Nhiệm vụ</h3>
<a href="{{route('tasks.create')}}" class='btn btn-success'><i class="bi bi-plus-circle"></i> Thêm nhiệm vụ mới</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col" colspan="3" class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td scope="col">{{$task->id}}</td>
            <td scope="col">{{$task->title}}</td>
            <td scope="col">{{$task->description}}</td>
            <td scope="col">{{$task->completed}}</td>
            <td scope="col">{{$task->created_at}}</td>
            <td scope="col">
                <a href="{{route('tasks.show',$task->id)}}" class="btn btn-success"><i class="bi bi-eye"></i></a>
            </td>
            <td scope="col">
                <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
            </td>
            <td scope="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$task->id}}">
                    <i class="bi bi-trash3"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa bài viết</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xóa bài viết này không? {{$task->id}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-success">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection