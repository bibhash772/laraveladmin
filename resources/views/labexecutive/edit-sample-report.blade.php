@extends('layouts.default') 

@push('css')
<link rel="stylesheet" href="{{asset('css/pages/pages.css')}}">
@endpush

@section('content')
<style>
    .tabledit-delete-button{
        display:none;
    }
</style>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Sample Report</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin/home"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/labexecutive/sample">Sample</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <!-- [ Main Content ] start -->
                        
                        <div class="row">
                            <table class="table table-striped table-bordered" id="example-1">
                                                
                            </table>
                            <!-- Edit With Button card start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Sample Report</h5>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="example-2">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>replicate</th>
                                                        <th>esv_id</th>
                                                        <th>perc_reads</th>
                                                        <th>test_id</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sample_report as $data)
                                                    <tr>

                                                        <th scope="row">{{$data->id}}
                                                        	 
                                                        </th>
                                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$data->replicate}}</span>
                                                            <input class="tabledit-input form-control input-sm" type="text" name="First" value="{{$data->replicate}}" style="display:none;">
                                                        </td>
                                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$data->esv_id}}</span>
                                                            <input class="tabledit-input form-control input-sm" type="text" name="Last" value="{{$data->esv_id}}" style="display:none;">
                                                        	
                                                        </td>
                                                         <td class="tabledit-view-mode"><span class="tabledit-span">{{$data->perc_reads}}</span>
                                                            <input class="tabledit-input form-control input-sm" type="text" name="Last1" value="{{$data->perc_reads}}" style="display:none;">
                                                            
                                                        </td>
                                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$data->test_id}}</span>
                                                            <select class="tabledit-input form-control input-sm" name="test_id" disabled="" style="display:none;">
                                                                <option value="Fish-{{$data->id}}" {{ ( $data->test_id =='Fish') ? 'selected' : '' }}>Fish</option>
                                                                <option value="Algae-{{$data->id}}" {{ ( $data->test_id =='Algae') ? 'selected' : '' }}>Algae</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit With Button card end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script src="{{asset('plugins/editable/js/jquery.tabledit.js') }}"></script> 
<script src="{{asset('js/pages/editable-custom.js') }}"></script> 
@endpush