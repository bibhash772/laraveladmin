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
                                            <li class="breadcrumb-item"><a href="#!">Contact us</a></li>
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
                                        <h5>Contact us</h5>
                                    </div>
                                    <div class="card-body">
                
                                    <div class="col-xl-12 table-responsive">
                                      <table class="table table-striped table-bordered nowrap" id = "offers-table">
                                        <thead>
                                          <tr>
                                            <th>Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Message</th>
                                            <th>Date</th>
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
    {{csrf_field()}}
</section>
@endsection

@section('footer-script')



<script type="text/javascript">
    var kitlisttable;
  $(document).ready(function(){
    
    var makeTable  = function (params = null){

      if (kitlisttable) {
            kitlisttable.destroy();
      }

      var url = "/api/contact-list";
      if (params != null) {
          url += url.indexOf('?') == -1 ? '?'+params : '&'+params;
      }

      kitlisttable = $('#offers-table').DataTable({
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

                    {"data": "id","orderable" : false},
                    {"data": "first_name","orderable" : true},
                    {"data": "last_name","orderable" : true},
                    {"data": "email","orderable" : true},
                    {"data": "phone_no","orderable" : true},
                    {"data": "message","orderable" : true},
                    {"data": "created_at","orderable" : true},
                    {"data": "id","orderable" : false,className: "list_icon",}
          ],
          "columnDefs": [
              {
                  "targets" : -1,
                  "render" : function (data , type, full, meta){
                      var html = "<a title='Reply' data-id='"+full.id+"'' class='replytext' href='javascript:;'><i class='fas fa-reply '></i></a>";
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
      kitlisttable.buttons().container().appendTo('#exportListOffers');
      $(".dataTables_filter input").attr("placeholder", "contact");
    }

    makeTable();
    /* Action offer request start */
  });
  $(document.body).on('click','.replytext',function(){
    var contact_id = $(this).attr('data-id'); 
    var url = '/api/reply-contact-us';
    var token=$("input[name=_token]").val();;
    const { value: text } =  Swal.fire({
        input: 'textarea',
        inputPlaceholder: 'Type your message here...',
        inputAttributes: {
          'aria-label': 'Type your message here'
        },
        showCancelButton: true,
        inputValidator: (value) => {
          return new Promise((resolve) => {
            if (value != '') {
               $.ajax({
                url: url,
                type: 'post',
                data:{id:contact_id,message:value,_token:token},
                dataType: 'json',
                success:function(response)
                  {
                        if(response.status){
                          Swal.fire('',response.message,'success');
                          }else{
                             Swal.fire('',response.message,'error');
                          }
                  },
              });
            } else {
              resolve('Please write someting')
            }
          })
        }
    })
  });
</script>
@endsection
