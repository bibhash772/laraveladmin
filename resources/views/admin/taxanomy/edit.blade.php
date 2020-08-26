<!-- [ Main Content ] start -->
@extends('layouts.default')
@section('content')
 <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/multi-select/css/multi-select.css')}}">
<style>
    .displayfish{
        display:none;
    }
    .select2-selection{
        background: #eff3f6!important;
        padding: 6px 19px!important;;
        font-size: 14px!important;;
        height: auto!important;;
    }
</style>
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                           	<div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin/home"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/taxonomy">Taxonomy</a></li>
                                             <li class="breadcrumb-item"><a >Edit Taxonomy</a></li>
                                        </ul>
                                    </div>
                                </div>
                        	</div>
                        <!-- [ breadcrumb ] end -->
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ Form Validation ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Taxonomy</h5>
                                    </div>
                                    <div class="card-body">
                                           @if(Session::has('message'))
                                                <div class="{{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                                    {{ Session::get('message') }}
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                            @endif
                                        <form id="add-taxonomy" action="/admin/taxonomy/edit" method="post">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <input type="hidden" value="{{@$esv->id}}" name="id"/>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Test Id</label>
                                                        <select class="form-control" name="test_id" id="test_id">
                                                            @foreach(TEST_TYPE as $testdata)
                                                            <option value="{{$testdata}}" {{ ( $esv->test_id == $testdata) ? 'selected' : '' }}>{{$testdata}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Esv Id</label>
                                                        <input type="text" class="form-control" name="esv_id" placeholder="Esv Id" value="{{@$esv->esv_id}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Kingdom</label>
                                                        <input type="text" class="form-control" name="kingdom" placeholder="Kingdom" value="{{@$esv->kingdom}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Phylum</label>
                                                        <input type="text" class="form-control" name="phylum" placeholder="Phylum" value="{{@$esv->phylum}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Order</label>
                                                        <input type="text" class="form-control" name="order" placeholder="Order" value="{{@$esv->order}}">
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Family</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="family" value="{{@$esv->family}}" placeholder="Family">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Genus</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="genus" value="{{@$esv->genus}}" placeholder="Genus">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Species</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="species" value="{{@$esv->species}}" placeholder="Species">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Common Name</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="common_name" value="{{@$esv->common_name}}" placeholder="Common Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Perc Match</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="perc_match" value="{{@$esv->perc_match}}" placeholder="Perc Match">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Sequence</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="sequence" value="{{@$esv->sequence}}" placeholder="Sequence">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Class</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="class" value="{{@$esv->class}}" placeholder="Sequence">
                                                        </div>
                                                    </div>
                                                </div>
                                                     <div class="col-md-4 displayfish">
                                                        <div class="form-group">
                                                            <label class="form-label">Species Image</label>
                                                            <div>
                                                                <select class="select2 form-control species_image" name="species_image">
                                                                     <option value="0">Select spices image</option>
                                                                    @foreach ($spices_images as $image)
                                                                     <?php 
                                                                    $image_view=str_replace(public_path().'/esv_images/species/','',$image);
                                                                    ?>
                                                                    <option value="{{$image_view}}"  {{ ( $esv->species_img == $image_view) ? 'selected' : '' }}>{{$image_view}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 displayfish">
                                                        <div class="form-group">
                                                            <?php 
                                                            $speciesimage=($esv->species_img)?asset('esv_images/species/').'/'.$esv->species_img:asset('images/no_Image.png');
                                                            ?>
                                                            <img src="{{$speciesimage}}" width="120px;" height="120px;" style="border:1px solid gray;" id="species_image">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 displayfish">
                                                        <div class="form-group">
                                                            <label class="form-label ">Map Image</label>
                                                            <div>
                                                                <select class="select2 form-control map_image" name="map_image">
                                                                     <option value="0">Select map image</option>
                                                                    @foreach ($map_images as $image)
                                                                    <?php 
                                                                    $image_view=str_replace(public_path().'/esv_images/map/','',$image);
                                                                    ?>
                                                                    <option value="{{$image_view}}" {{ ( $esv->map_img == $image_view) ? 'selected' : '' }}>{{$image_view}}</option>
                                                                    @endforeach
                                                                </select>
                                                              <!--   <input type="text" class="form-control" name="class" value="{{@$esv->map_img}}" placeholder="Map Image"> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 displayfish">
                                                        <div class="form-group">
                                                            <?php 
                                                            $mapimage=($esv->map_img)?asset('esv_images/map/').'/'.$esv->map_img:asset('images/no_Image.png');
                                                            ?>
                                                            <img src="{{$mapimage}}" width="120px;" height="120px;"style="border:1px solid gray;" id="map_image">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 displayfish">
                                                         <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <div>
                                                               <textarea class="form-control" rows="4"  value="{{@$esv->description}}" name="description" placeholder="Description">{{@$esv->description}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="col-md-12">
                                                <button type="submit" name="taxanomy_submit" class="btn btn-primary">Submit</button>
                                            	</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Form Validation ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footer-script')
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script> 
@if($esv->test_id == 'Fish')
<script type="text/javascript">
$(document).ready(function(){
    $('.displayfish').show();
});
</script>
@endif
<script>
    $(document).ready(function(){
        $(".select2").select2({
            placeholder: "Select Map Image"
        });
        $('.species_image').change(function(){
            if($(this).val()!=0){
                var image_data="{{asset('esv_images/species/')}}/"+$(this).val();
            }else{
                 var image_data="{{asset('images/no_Image.png')}}";
            }
            
            $('#species_image').attr('src',image_data)
        })
         $('.map_image').change(function(){
            if($(this).val()!=0){
                var image_data="{{asset('esv_images/map/')}}/"+$(this).val();
            }else{
                 var image_data="{{asset('images/no_Image.png')}}";
            }
            $('#map_image').attr('src',image_data)
        })
    });
    $(document).ready(function(){
        $('#test_id').change(function(){
            if($(this).val()=='Fish'){
                $('.displayfish').show();
            }else{
                 $('.displayfish').hide();
            }
        });
    });
</script>
@endsection