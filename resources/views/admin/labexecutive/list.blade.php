@extends('layouts.default')
@section('content')
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
                                            <li class="breadcrumb-item"><a href="/admin/home"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Lab Executive</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Lab Executive</h5>
                                    </div>
                                    <div class="card-body">
                
                                        <div class="col-xl-12 table-responsive">
                              <table class="table table-striped table-bordered nowrap" id = "offers-table">
                                <thead>
                                  <tr>
                                                  <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>City</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                </thead>
                                <tbody> </tbody>
                              </table>
                            </div>
                                    </div>
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

@section('footer-script')



<script type="text/javascript">
  $(document).ready(function(){
    var offerTable;
    
    var makeTable  = function (params = null){

      if (offerTable) {
            offerTable.destroy();
      }

      var url = "/api/labesecutivelist";
      if (params != null) {
          url += url.indexOf('?') == -1 ? '?'+params : '&'+params;
      }

      offerTable = $('#offers-table').DataTable({
          responsive: true,
          "searchPlaceholder": "search",
          "drawCallback" : function () {
              $('[data-toggle="tooltip"]').tooltip({
                  container: 'body'
              });
          },
          "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull) {
              $(nRow).attr("id",'th_' + aData['id']);
              return nRow;
          },
          "columns": [

                    {"data": "user_id","orderable" : false},
                    {"data": "first_name","orderable" : true},
                    {"data": "email","orderable" : true},
                    {"data": "phone_no","orderable" : true},
                    {"data": "city","orderable" : true},
                    {"data": "status","orderable" : true},
                    {"data": "created_at","orderable" : true},
                    { "data": "id","orderable" : false,className: "list_icon",}
          ],
          "columnDefs": [
              {
                  "targets" : 1,
                  "render" : function (data , type, full, meta){
                    return full.first_name+' '+full.last_name;
                  }
              },
              {
                  "targets" : 5,
                  "render" : function (data , type, full, meta){
                    if(full.status==1){
                      return '<span id="status_'+full.user_id+'" class="label-success label label-default ustatus" data-id="'+full.user_id+'" style="cursor:pointer;">Active</span>';
                    }else{
                       return '<span id="status_'+full.user_id+'" class="label-danger label label-default ustatus" data-id="'+full.user_id+'" style="cursor:pointer;">Inactive</span>';
                    }
                  }
              },
              {
                  "targets" : -1,
                  "render" : function (data , type, full, meta){
                      var html = "<a title='edit' href='/admin/labexecutive-edit/"+full.user_id+"'><i class='fas fa-edit '></i></a>";
                      return html;
                  }
              },
          ],
          buttons: [
          ],
          "dom": 'Blfrtip',
          "processing": true,
          "serverSide": true,
          "paging": true,
          "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
          "pagingType": "full_numbers",
          "pageLength": 50,
          "ajax": url
      });
      offerTable.buttons().container().appendTo('#exportListOffers');
      $(".dataTables_filter input").attr("placeholder", "Lab executive");
    }

    makeTable();
    /* Action offer request start */
  });
  $(document.body).on('click','.ustatus',function(){
      var text = $(this).html();
      var uid = $(this).attr('data-id');
      var data = 'id='+uid+'&text='+text; 
      var url = '/api/userstatus';
      var button = $(this);
      if(text && uid)
      {
        $.ajax({
        url: url,
        type: 'get',
        data: data,
        dataType: 'json',
        success:function(response)
        {
          $(button).text(response['user_status']);
          $(button).attr('class',response['status_class']);
        },
        });
      }
  });
</script>
@endsection
