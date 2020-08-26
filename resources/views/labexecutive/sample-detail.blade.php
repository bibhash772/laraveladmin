@extends('layouts.default') @section('content')
<style>
    table.dataTable tbody tr td {
        word-wrap: break-word;
        word-break: break-all;
    }
</style>
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
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/labexecutive/sample">Sample</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Sample Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="row">
                            <!-- Default Styling table start -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>SPECIES PRESENT</h5>
                                    </div>
                                    <div class="card-body table-border-style m-h-400">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Species</th>
                                                        <th>Common Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($sample_data['Fish'] as $data)

                                                        <tr>
                                                            <td width="40%">{{$data->genus}} {{$data->species}}</td>
                                                            <td width="40%">{{$data->common_name}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Default Styling table start -->
                            <!-- [ Header-Styling ] start-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Genus Value</h5>
                                    </div>
                                    <div class="card-body table-border-style m-h-400">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Taxa</th>
                                                        <th>% Abundance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($algaegenus as $key => $genusdata)
                                                    <tr>
                                                        <td width="50%">{{$key}}</td>
                                                        <td width="50%">{{$genusdata->sum('perc_reads')}}%</td>
                                                    </tr>
                                                    @endforeach                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         	 <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Order Value</h5>
                                    </div>
                                    <div class="card-body table-border-style m-h-400">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Taxa</th>
                                                        <th>% Abundance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($algaeorder as $key => $algaeorderdata)
                                                    <tr>
                                                        <td width="50%">{{$key}}</td>
                                                        <td width="50%">{{$algaeorderdata->sum('perc_reads')}}%</td>
                                                    </tr>
                                                    @endforeach                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Family Value</h5>
                                    </div>
                                    <div class="card-body table-border-style m-h-400">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Taxa</th>
                                                        <th>% Abundance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($algaefamily as $key => $algaefamilydata)
                                                    <tr>
                                                        <td width="50%">{{$key}}</td>
                                                        <td width="50%">{{$algaefamilydata->sum('perc_reads')}}%</td>
                                                    </tr>
                                                    @endforeach                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Phylum Value</h5>
                                    </div>
                                    <div class="card-body table-border-style m-h-400">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Taxa</th>
                                                        <th>% Abundance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($algaephylum as $key => $algaephylumdata)
                                                    <tr>
                                                        <td width="50%">{{$key}}</td>
                                                        <td width="50%">{{$algaephylumdata->sum('perc_reads')}}%</td>
                                                    </tr>
                                                    @endforeach                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection