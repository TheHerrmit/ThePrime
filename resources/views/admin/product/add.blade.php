@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
        <form action="" method="POST">
            <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="0">Danh mục cha</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input class="form-control" name="price" placeholder="Enter ..."></input>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá giảm</label>
                        <input class="form-control"  name="price_sale" placeholder="Enter ..." ></input>
                    </div>
                </div>
            </div>

                <div class="form-group">
                    <label>Mô Tả </label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

            <div class="form-group" id="#editor">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content"class="form-control"></textarea>
            </div>

            <form class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" id="upload" class="form-control" >
            </form>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Sản phẩm</button>
            </div>
            @csrf

        </form>

@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection

