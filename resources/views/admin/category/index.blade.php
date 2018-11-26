@extends('admin.layouts.main')

@section('title', 'Classes')

@section('content-header')
    <h1>Classes</h1>
@endsection

@section('content')
<input type="hidden" id="delete_class_url" value="{{ route('admin_delete_class', '') }}">
<div class="col-xs-12">
    <div class="box">                
    <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="top-acction pull-right">
                        <button class="search-submit btn button-grey" type="submit" id="filter_btn">New Category</button>
                    </div>
                </div>
            </div>
            <table id="classes" class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Enable</th>
                        <th>Has Awaken</th>
                        <th>Create At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->enable ? 'Yes' : 'No' }}</td>
                        <td>{{ $category->has_awk ? 'Yes' : 'Not Yet' }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('admin_edit_class', $category->id) }}"><i class="fa fa-cog"></i> </a>
                            <a href="#" title="" class="delete-class" data-id="{{ $category->id }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <!-- /.box-body -->
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" name="class-id">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Delete Class</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this class?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="delete_btn">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal add category -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" name="class-id">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Delete Class</h4>
            </div>
            <div class="modal-body">
                <form method='POST' class="form-horizontal" id="category_form">
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Parent</label>
                            <div class="col-sm-4">
                                <select name="enable" class="form-control">
                                    <option>Select parent</option>
                                </select>
                            </div>

                            <label class="col-sm-2 control-label">Active</label>
                            <div class="col-sm-4">
                                <select name="has_awk" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" placeholder="Enter ..." name="desc"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="delete_btn">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

        
@endsection

@section('js')
<script src="{{ asset('admin/js/classes.js') }}"></script>
@endsection