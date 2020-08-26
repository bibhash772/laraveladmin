@extends('layouts.user')
@section('content')
    <section class="db_sec">
        <div class="container">
            <h3 class="hm_headng">EXPLORE YOUR DATA</h3>
            <div class="db_content">
                <ul class="nav nav-tabs db_tabs">
                    <li class="nav-item">
                        @if($sampledetail->user_id==Auth::user()->user_id)
                        <a class="nav-link active"  href="/user/explore-data">MY SAMPLES</a>
                        @else
                        <a class="nav-link active"  href="/user/explore-all-data">All SAMPLES</a>
                        @endif
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                 
                    <div class="tab-pane fade mt-5 active show" id="mydata">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <ul class="nav nav-tabs db_tabs_2">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#sampleinfo">SAMPLE INFO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#taxa">TAXA</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tb_right">
                                Kit Id : <span>{{$sampledetail->kitcode}}</span>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sampleinfo">
                                <div class="profile_info">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <table class="table db_table_th" cellpadding="0" cellspacing="0">
                                                <thead>
                                                    <tr> 
                                                        <th width="50%">
                                                            Category
                                                        </th>
                                                        <th width="40%">
                                                            Information
                                                        </th>
                                                        <th width="10%">
                                                            Edit
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table db_table_td mt-4">
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">Date</td>
                                                        <td width="40%" id="sample_date">{{date('m/d/Y',strtotime($sampledetail->sample_date))}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="sample_date" data-val="{{date('m/d/Y',strtotime($sampledetail->sample_date))}}" data-type="date" data-placeholder="Sample Date"></i></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Time</td>
                                                        <td width="40%" id="sample_time">{{date('h:i A',strtotime($sampledetail->sample_time))}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="sample_time" data-val="{{date('h:i A',strtotime($sampledetail->sample_time))}}" data-type="time" data-placeholder="Sample Time"></i></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Latitude</td>
                                                        <td width="40%" id="latitude">{{$sampledetail->latitude}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="latitude" data-val="{{$sampledetail->latitude}}" data-type="text" data-placeholder="Latitude"></i></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Longitude</td>
                                                        <td width="40%" id="longitude">{{$sampledetail->longitude}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="longitude" data-val="{{$sampledetail->longitude}}" data-type="text" data-placeholder="Longitude"></i></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Public Status</td>
                                                        <td width="40%" id="is_public">{{($sampledetail->is_public==1)?'Publish':'Private'}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="is_public" data-val="{{$sampledetail->is_public}}" data-type="select" data-placeholder="Publish Status"></i></td>
                                                        @endif
                                                    </tr>
                                                  
                                                    <tr>
                                                        <td width="50%">User Site Name</td>
                                                        <td width="40%" id="site_name">{{$sampledetail->site_name}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="site_name" data-val="{{$sampledetail->site_name}}" data-type="text" data-placeholder="Site Name"></i></td>
                                                        @endif
                                                    </tr>
                                                     <tr>
                                                        <td width="50%">Volume Water</td>
                                                        <td width="40%" id="water_value">{{$sampledetail->water_value}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="water_value" data-val="{{$sampledetail->water_value}}" data-type="text" data-placeholder="Water Value"></i></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Sample Note</td>
                                                        <td width="40%" id="sample_notes">{{$sampledetail->sample_notes}}</td>
                                                        @if($sampledetail->user_id==Auth::user()->user_id)
                                                        <td width="10%"><i class="fas fa-edit" data-id="sample_notes" data-val="{{$sampledetail->sample_notes}}" data-type="text" data-placeholder="Sample Notes"></i></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Date Received by Lab</td>

                                                        <td width="40%" id="sample_received_date">{{(!empty($sampledetail->sample_received_date))?date('m/d/Y',strtotime($sampledetail->sample_received_date)):'Not Received'}}</td>
                                                        <td width="10%"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 col-lg-6" id="map">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="taxa">
                                @if(count($sample_data)>0)
                                    <div class="profile_info">
                                        <div class="d-flex justify-content-between align-items-center taxa_inf flex-wrap">
                                            <div>
                                                <h4>SPECIES PRESENT</h4>
                                            </div>
                                            <div class="mb_select">
                                                <select class="form_cntrl2" id="op_selector">
                                                    <option value="Fish">Fish</option>
                                                    <option value="Algae">Algae</option>
                                                </select>
                                                 <select class="form_cntrl2" id="algae_select" style="display:none">
                                                    <option value="genus">Genus</option>
                                                    <option value="family">Family</option>
                                                    <option value="order">Order</option>
                                                    <option value="class">Class</option>
                                                    <option value="phylum">Phylum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3 all_info">
                                            <table class="table db_table_th" cellpadding="0" cellspacing="0">
                                                <thead>
                                                    <tr> 
                                                        <th width="50%">
                                                            Species
                                                        </th>
                                                        <th width="50%">
                                                            Common Name
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table db_table_td mt-4">
                                                    <tbody>
                                                        @foreach($sample_data['Fish'] as $data)
                                                        <tr onclick='openspicesdetail("{{$data->map_img}}","{{$data->species_img}}","{{$data->description}}","{{$data->genus}} {{$data->species}}","{{$data->common_name}}")'>
                                                            <td width="50%">{{$data->genus}} {{$data->species}}</td>
                                                            <td width="50%">{{$data->common_name}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                            </table>
                                        </div>
                                        <div class="select_info" style="display: none;">
                                            <div class="row align-items-center" id="algaedata">
                                                <div class="col-12 col-lg-6">
                                                    <table class="table db_table_th" cellpadding="0" cellspacing="0">
                                                        <thead>
                                                            <tr> 
                                                                <th width="50%">
                                                                    Taxa
                                                                </th>
                                                                <th width="50%">
                                                                    % Abundance
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <table class="table db_table_td mt-4">
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
                                                <div class="col-12 col-lg-6 text-center">
                                                   {!!$pie->html() !!}
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                @else
                                 <div>
                                    <h4 class="no-data-found">No report submited yet</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{csrf_field()}}
        <div class="modal" id="show_discription">
            <div class="modal-dialog modal-1000 modal_bg">
                <div class="modal-content">
                    <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
                  
                </div>
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="modal_left mobile-overlow w-100">
                    <div class="p-l-36">
                        <span id="sic_name">Ascipenser fulvescens</span>
                    </div>
                    <div class="p-l-36">
                        <span id="com_name">Ascipenser fulvescens</span>
                    </div>
                   
                    <div class="row p-10">
                        <div class="col-lg-12"><img id="species_img"src="{{asset('images/no_Image.png')}}" style="max-width: 100%;"></div>
                    </div>
                     <div class="row p-10">
                        <div class="col-lg-12"><img id="map_image" src="{{asset('images/no_Image.png')}}" style="max-width: 100%;"></div>
                    </div>
                    <div class="row p-10">
                        <div class="col-lg-12" id="des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    </div> 
            </div>
        </div>
    </section>
      <script type="text/javascript">
// Initialize and add the map
   function initMap() {
      // The location of Uluru
        var uluru = {lat: {!! $sampledetail->latitude !!}, lng: {!! $sampledetail->longitude !!} };
      // The map, centered at Uluru
        var latlng = {lat: parseFloat({!! $sampledetail->latitude !!}), lng: parseFloat({!! $sampledetail->longitude !!})};
        var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 6, center: uluru});
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: 'Set lat/lon values for this property',
            draggable: true
        });
      // The marker, positioned at Uluru
    }

    </script>
    <script async defer type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuez0sjpQZGpO4HQ3WTA1QJsyE91c4Blk&callback=initMap">
    </script>
    {!! Charts::scripts() !!}
    {!! $pie->script() !!}

    <script type="text/javascript">
    $(document.body).on('change','#algae_select',function(){
        var type =$('#algae_select').val();
        var sample_code="{!!$sampledetail->sample_code!!}";
        var data = 'type='+type+'&code='+sample_code; 
        var url = '/api/sampledetail';
        $.ajax({
                  url: url,
                  type: 'get',
                  data: data,
                  dataType: 'json',
                  success:function(response)
                    {
                            if(response.status==1){
                                $('#algaedata').html(response.html);
                            }
                    },
        });
    })
    $(document.body).on('click','.fa-edit',function(){
        var data_value=$(this).attr('data-val');
        var data_name=$(this).attr('data-id');
        var data_type=$(this).attr('data-type');
        var data_placeholder=$(this).attr('data-placeholder');
        var clickedvar=$(this);
        if(data_type=='date'){
            var swwtalertdata={title:data_placeholder,showCancelButton: true,html: "<input id='datepicker' readonly class='swal2-input' value='"+data_value+"'>",customClass: 'swal2-overflow',onOpen:function(){$('#datepicker').bootstrapMaterialDatePicker({ weekStart: 0,time: false,format : 'MM/DD/YYYY'});}};
        }else if(data_type=='time'){
             var swwtalertdata={title:data_placeholder,showCancelButton: true,html: "<input id='datepicker' readonly class='swal2-input' value='"+data_value+"'>",customClass: 'swal2-overflow',onOpen:function(){$('#datepicker').bootstrapMaterialDatePicker({ date: false,format: 'hh:mm a'});}};
        }else if(data_type=='select'){
             var swwtalertdata={title:data_placeholder,input: 'select', inputOptions: {'1': 'Publish','0': 'Private'},inputValue:data_value,showCancelButton: true}
        }else{
            var swwtalertdata={title: data_placeholder,input: 'text',inputValue: data_value,showCancelButton: true,}
        }
        
        Swal.fire(swwtalertdata).then(function(result) {
            if(result.value){
                    if(data_type=='date' || data_type=='time'){
                        var val=$('#datepicker').val();
                    }else{
                        var val=result.value;
                    }
                    var token=$("input[name=_token]").val();
                    var sample_code="{!!$sampledetail->sample_code!!}";
                    var url = '/api/edit-sample-detail';
                    $.ajax({
                      url: url,
                      type: 'post',
                      data:{value:val,code:sample_code,name:data_name,_token:token,type:data_type},
                      dataType: 'json',
                      success:function(response)
                        {
                                if(response.status){
                                    clickedvar.attr('data-val',val);
                                    if(data_type=='select'){
                                       val=(val==0)?'Private':'Publish';
                                    }
                                    $('#'+data_name).html(val);
                                }else{
                                     Swal.fire(response.message)
                                }
                        },
                    });
            }
        });     
    });
</script>
<script>
function openspicesdetail(map_img,species_img,des,sic_name,com_name) {
    if(map_img){
        var image_data="{{asset('esv_images/map/')}}/"+map_img;
    }else{
         var image_data="{{asset('images/no_Image.png')}}";
    }
    $('#map_image').attr('src',image_data);
    if(species_img){
        var image_data="{{asset('esv_images/species/')}}/"+species_img;
    }else{
         var image_data="{{asset('images/no_Image.png')}}";
    }
    $('#species_img').attr('src',image_data);
    $('#des').html(des);
    $('#sic_name').html(sic_name);
    $('#com_name').html(com_name);
    if ($(window).width() < 767) {
        document.getElementById("mySidenav").style.width = "100%";
    }
    else {
       document.getElementById("mySidenav").style.width = "25%";
    }
    
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
@endsection

