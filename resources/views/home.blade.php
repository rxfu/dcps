@extends('app')

@section('content')
<div class="container-wrapper">
    <div class="container-fluid">
        <div class="card md-3">
            <div class="card-header">评审项目列表</div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>项目编号</th>
                                <th>项目名称</th>
                                <th>项目类别</th>
                                <th>所属学科</th>
                                <th>负责人</th>
                                <th>申请时间</th>
                                <th>填写意见</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->xmbh }}</td>
                                    <td>{{ $project->xmmc }}</td>
                                    <td>{{ $project->category->mc }}</td>
                                    <td>{{ $project->subject->mc }}</td>
                                    <td>{{ $project->student->xm }}</td>
                                    <td>{{ date('Y-m-d', strtotime($project->cjsj)) }}</td>
                                    <td>
                                        <span data-placement="top" data-toggle="tooltip" title="评审">
                                            <a href="{{ route('project.review', $project->id) }}" class="btn btn-primary btn-xs" role="button">评审</a>
                                        </span>
                                        <span data-placement="top" data-toggle="tooltip" title="显示申报书">
                                            <a href="{{ route('project.pdf', $project->id) }}" class="btn btn-success btn-xs" role="button">显示申报书</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
