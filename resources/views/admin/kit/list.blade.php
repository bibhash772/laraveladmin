@extends('layouts.default') @section('content')
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
                                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Kits</a></li>
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
                                        <h5>Kits</h5>
                                        <button type="button" class="btn btn-primary f-right" data-toggle="modal" data-target="#uploadkit"><i class="feather icon-upload"></i>Upload Kits</button>
                                        <a  class="btn btn-primary f-right" href="{{asset('sample_upload/kit.csv')}}"><i class="feather icon-download"></i>Download File Sample</a>
                                    </div>
                                    <div class="card-body">

                                        <div class="col-xl-12 table-responsive">
                                                @if(Session::has('message'))
                                                  <div class="{{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                                      {{ Session::get('message') }}
                                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  </div>
                                                @endif
                                            <table class="table table-striped table-bordered nowrap" id="offers-table">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Kit Code</th>
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
    <div id="uploadkit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Upload Kits (Upload csv file)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="taxanomy" method="post" action="/admin/kits/upload" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="btn btn-outline-primary" name="kitfile" data-toggle="tooltip" data-original-title="btn btn-outline-primary" value="Select file" accept=".csv">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection @section('footer-script')

<script type="text/javascript">
    var kitlisttable;
    $(document).ready(function() {

        var makeTable = function(params = null) {

            if (kitlisttable) {
                kitlisttable.destroy();
            }

            var url = "/api/kitlist";
            if (params != null) {
                url += url.indexOf('?') == -1 ? '?' + params : '&' + params;
            }

            kitlisttable = $('#offers-table').DataTable({
                responsive: true,
                "searchPlaceholder": "search",
                "drawCallback": function() {
                    $('[data-toggle="tooltip"]').tooltip({
                        container: 'body'
                    });
                },
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $(nRow).attr("id", 'th_' + aData['id']);
                    return nRow;
                },
                "columns": [

                    {
                        "data": "kit_id",
                        "orderable": false
                    }, {
                        "data": "kit_code",
                        "orderable": true
                    }, {
                        "data": "kit_status_id",
                        "orderable": true
                    }, {
                        "data": "created_at",
                        "orderable": true
                    }, {
                        "data": "id",
                        "orderable": false,
                        className: "list_icon",
                    }
                ],
                "columnDefs": [{
                    "targets": 2,
                    "render": function(data, type, full, meta) {
                        if (full.kit_status_id == 1) {
                            return '<span  class="label-success label label-default ustatus" style="cursor:pointer;">Active</span>';
                        } else {
                            return '<span  class="label-danger label label-default ustatus"  style="cursor:pointer;">Inactive</span>';
                        }
                    }
                }, {
                    "targets": -1,
                    "render": function(data, type, full, meta) {
                        var html = "<a title='edit' href='/admin/kit-edit/" + full.kit_id + "'><i class='fas fa-edit '></i></a> <a title='delete' data-id='" + full.kit_id + "'' class='deletekit' href='javascript:;'><i class='fas fa-trash '></i></a>";
                        return html;
                    }
                }, ],
                buttons: [],
                "dom": 'Blfrtip',
                "processing": true,
                "serverSide": true,
                "paging": true,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                "pagingType": "full_numbers",
                "pageLength": 50,
                "ajax": url
            });
            kitlisttable.buttons().container().appendTo('#exportListOffers');
            $(".dataTables_filter input").attr("placeholder", "Kit");
        }

        makeTable();
        /* Action offer request start */
    });
    $(document.body).on('click', '.deletekit', function() {
        var kit = $(this).attr('data-id');
        var data = 'id=' + kit;
        var url = '/api/deletekit';
        Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                cancelButtonColor: '#d33',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    $.ajax({
                        url: url,
                        type: 'get',
                        data: data,
                        dataType: 'json',
                        success: function(response) {
                            kitlisttable.ajax.reload();
                        },
                    });
                }
            });
    });
</script>
@endsection