@extends('BoiVui.boivui_template')

@section('content')

<div class="container col-lg-12 text-center">
    {{ Form::open(array('url'=>'/submit', 'method'=>'POST', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Tên: </label>
            <div class="col-sm-3">
                <input name="name" class="form-control" id="name" placeholder="Họ và Tên">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Ngày sinh: </label>
            <div class="col-sm-1">
                <select name="day">
                    @for ($i = 1; $i<=31; $i++)
                    <option>{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="col-sm-1">
                <select name="month">
                    @for ($i = 1; $i<=12; $i++)
                        <option>{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="col-sm-1">
                <select name="year">
                    @for ($i = 1950; $i<=2015; $i++)
                        <option>{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giới tính: </label>
            <div class="col-sm-1">
                <select name="sex">
                    <option value="m">Nam</option>
                    <option value="f">Nữ</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="btn btn-default">Xem kết quả</button>
            </div>
        </div>
    {{ Form::close() }}
</div>

@stop