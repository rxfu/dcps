@extends('app')

@section('content')
<div class="container-wrapper">
    <div class="container-fluid">
        <div class="card md-3">
            <div class="card-header">填写评审意见</div>

            <div class="card-body">
                <form method="post" action="{{ route('project.review', $project->id) }}">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="psyj" class="col-md-3 col-sm-3 col-xs-12 col-form-label text-right">评审意见</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="psyj" id="psyj" class="form-control" rows="10">{{ is_null($review) ? '' : $review->psyj }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pf" class="col-md-3 col-sm-3 col-xs-12 col-form-label text-right">评分 <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="pf" name="pf" placeholder="评分" value="{{ is_null($review) ? '' : $review->pf }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3">
                            <button type="submit" class="btn btn-success">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
