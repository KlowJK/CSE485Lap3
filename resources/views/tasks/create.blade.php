@extends('layout.parent')
@section(['title' => 'Thêm nhiệm vụ'])
@section('main')
{{$message=""}}
{{$errors=""}}
<div class="container mt-5">
    <h3 class="text-center text-uppercase text-success my-3">Thêm nhiệm vụ mới</h3>
    <?php if ($message): ?>
        <div class="container">
            <div class="alert alert-success  alert-dismissible" role="alert">
                <?php echo htmlspecialchars($message); ?>
                <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($errors): ?>
        <div class="container">
            <div class="alert alert-danger  alert-dismissible" role="alert">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
                <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Tiêu đề</label>
            <input type="text" id="name" name="name" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Mô tả chi tiết</label>
            <input type="text" id="image" name="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm bài viết</button>
        <a href="" class='btn btn-secondary'>Quay lại trang chủ</a>


    </form>
</div>
@endsection