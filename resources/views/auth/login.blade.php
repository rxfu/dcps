@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">登录系统</div>
                <div class="card-body">
                    @if ($allowed_dcxm)
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label text-right">用户名</label>
                                <div class="col-sm-6">
                                    <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" type="text" placeholder="请输入用户名" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-right">密码</label>
                                <div class="col-sm-6">
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" placeholder="请输入密码" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">登录</button>
                                </div>
                            </div>
                        </form>
                    @else
                        评审系统关闭中……
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
