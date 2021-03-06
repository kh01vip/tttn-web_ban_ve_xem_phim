@extends('layout_NV')
@section('dscuanv')
<div class="container-fluid">
    <h1>Sửa Phim</h1>
    <hr>

    <div class="card">
        <div class="card-body">
            <form action="{{ URL::to('phim/' . $phim->idPhim . '/update') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tenPhim">Tên Phim</label>
                    <input type="text" value="{{$phim->tenPhim}}" class="form-control" id="ten_phim" name="tenPhim">
                </div>
                <div class="form-group">
                    <label for="imgPhim">Poster Phim</label>
                    <input type="file" class="form-control" name="imgPhim" accept="image/*"
                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output" src="data:image/png;base64,{{ chunk_split(base64_encode($phim->imgPhim)) }}" 
                    width="100" height="150">
                </div>
                <div class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    @if($phim->trangthai==1)
                    <select class="border border-black" name="trangthai">
                    <option value="1">Còn chiếu</option>
                    <option value="0">Hết chiếu</option>
                    </select>
                    @else
                    <select class="border border-black" name="trangthai">
                    <option value="0">Hết chiếu</option>
                    <option value="1">Còn chiếu</option>
                    </select>
                    @endif
                </div>
                <div class="form-group">
                    <label>Loại Phim</label>
                    <select class="border border-black" name="LPhim">
                        @foreach(App\Models\tbl_loaiphim::all() as $LoaiPhim)
                        @if($LoaiPhim->idLPhim == $phim->idLPhim)
                        <option selected="selected" value="{{$LoaiPhim->idLPhim}}">{{$LoaiPhim->tenLPhim}}</option>
                        @else
                        <option value="{{$LoaiPhim->idLPhim}}">{{$LoaiPhim->tenLPhim}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea class="form-control" name="mieutaPhim">{{$phim->mieutaPhim}}</textarea>
                </div>
                <div class="form-group">
                    <label>Đạo diễn</label>
                    <input type="text" value="{{$phim->daodienPhim}}" class="form-control" name="daodienPhim">
                </div>
                <div class="form-group">
                    <label>Diễn viên</label>
                    <input type="text" value="{{$phim->dienvien}}" class="form-control" name="dienvien">
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection