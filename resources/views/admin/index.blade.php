@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content-header')
    <h1>Dashboard</h1>
@endsection

@section('content')
<div class="col-xs-12">
    <div class="box">                
    <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                        <th>業態</th>
                        <th>サイネジ名</th>
                        <th>表示位置</th>
                        <th>適用開始日</th>
                        <th>適用終了日</th>
                        <th>登録日</th>
                        <th>同期成功数</th>
                        <th>同期失収数</th>
                        <th>登録者</th>
                        <th>画像表示</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hamazushi’s</td>
                        <td>サイネジ1</td>
                        <td>2</td>
                        <td>2018/10/15</td>
                        <td>2018/10/15</td>
                        <td>2018/11/15</td>
                        <td>245</td>
                        <td><a href="#">4</a></td>
                        <td>namiki</td>
                        <td><a href="#">表示</a></td>
                        <td>
                            <a href="#" title="" data-toggle="modal" data-target="#modal-edit-media-files"><i class="fa fa-cog"></i> </a>
                            <a href="#" title=""><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <!-- /.box-body -->
    </div>
</div>
@endsection