@extends('layouts.user')
@section('content')
    <section class="db_sec">
        <div class="container">
            <h3 class="hm_headng">EXPLORE YOUR DATA</h3>
            <div class="db_content">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="mysample">
                        <div class="profile_info mt-4">
                            <div class="table-responsive">
                                <table class="table db_table_th" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr> 
                                            <th width="20%">
                                                Kit Id
                                            </th>
                                            <th width="20%">
                                                Date Collected
                                            </th>
                                            <th width="20%">
                                                Time Colllected
                                            </th>
                                            <th width="20%">
                                                User Site Name
                                            </th>
                                            <th width="20%">
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="table db_table_td mt-4">
                                    <tbody>
                                        @if(count($sampledata)>0)
                                            @foreach ($sampledata as $semple)
                                            <tr>
                                                <td width="20%">{{$semple->kitcode}}</td>
                                                <td width="20%">{{date('m/d/Y',strtotime($semple->sample_date))}}</td>
                                                <td width="20%">{{date('h:i A',strtotime($semple->sample_time))}}</td>
                                                <td width="20%">{{$semple->site_name}}</td>
                                                <td width="20%"><a href="/user/sample-detail/{{$semple->id}}">Explore Your Data</a></td>
                                            </tr>
                                            @endforeach
                                        @else
                                        <tr>No data found</tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection