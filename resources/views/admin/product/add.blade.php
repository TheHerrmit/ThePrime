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
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="0">Danh mục cha</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
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
                        <input class="form-control" name="price" value="{{old('price')}}" placeholder="Enter ..."></input>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá giảm</label>
                        <input class="form-control"  name="price_sale" Value="{{old('price_sale')}}" placeholder="Enter ..." ></input>
                    </div>
                </div>
            </div>

                <div class="form-group">
                    <label>Mô Tả </label>
                    <textarea name="description" Value="{{old('description')}}"class="form-control"></textarea>
                </div>

            <div class="form-group" id="#editor">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" Value="{{old('content')}}"class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" id="upload" class="form-control" >
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

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

