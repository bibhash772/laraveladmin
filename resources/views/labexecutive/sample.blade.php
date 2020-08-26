@extends('layouts.default') @section('content')
<style>
    table.dataTable tbody tr td {
        word-wrap: break-word;
        word-break: break-all;
    }
    .fas{
        padding: 5px;
    }
    .far{
        padding: 5px;
        color:#000;
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
                                            <li class="breadcrumb-item"><a href="/admin/home"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Sample List</a></li>
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
                                        <h5>Sample</h5>
                                        <button type="button" class="btn btn-primary f-right" data-toggle="modal" data-target="#uploadesv"><i class="feather icon-upload"></i>Upload Sample Report</button>
                                        <a  class="btn btn-primary f-right" href="{{asset('sample_upload/sample_result.csv')}}"><i class="feather icon-download"></i>Download File Sample</a>
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
                                                        <th width="10%">Name</th>
                                                        <th width="10%">Kit Code</th>
                                                        <th width="10%">Site Name</th>
                                                        <th width="10%">Water Value</th>
                                                        <th width="20%">Sample Notes</th>
                                                        <th width="10%">Created</th>
                                                        <th width="10%">Status</th>
                                                        <th width="10%">Action</th>
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
    <div id="uploadesv" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Upload Sample Report (Upload csv file)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="taxanomy" method="post" action="/labexecutive/samplereport/upload" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="btn btn-outline-primary" name="taxanomyfile" data-toggle="tooltip" data-original-title="btn btn-outline-primary" value="Select file" accept=".csv">
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
    $(document).ready(function() {
        var offerTable;

        var makeTable = function(params = null) {

            if (offerTable) {
                offerTable.destroy();
            }

            var url = "/api/labexecutive/samplelist";
            if (params != null) {
                url += url.indexOf('?') == -1 ? '?' + params : '&' + params;
            }

            offerTable = $('#offers-table').DataTable({
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
                "columns": [{
                    "data": "user_id",
                    width: '10%',
                    "orderable": true
                }, {
                    "data": "kit_id",
                    width: '10%',
                    "orderable": true
                }, {
                    "data": "site_name",
                    width: '10%',
                    "orderable": true
                }, {
                    "data": "water_value",
                    width: '10%',
                    "orderable": true
                }, {
                    "data": "sample_notes",
                    width: '20%',
                    "orderable": true
                }, {
                    "data": "created_at",
                    width: '10%',
                    "orderable": true
                }, {
                    "data": "status",
                    width: '10%',
                    "orderable": true
                },
                { "data": "id","orderable" : false,className: "list_icon",}
                 ],
                "columnDefs": [{
                    "targets": 0,
                    "render": function(data, type, full, meta) {
                        return full.user.first_name + ' ' + full.user.last_name;
                    }
                }, {
                    "targets": 1,
                    "render": function(data, type, full, meta) {
                        return full.kit.kit_code;
                    }
                }, {
                    "targets": 6,
                    "render": function(data, type, full, meta) {
                        if (full.status == 1) {
                            return '<span id="status_' + full.id + '" class="btn btn-primary sweet-basic ustatus" data-id="' + full.id + '" style="cursor:pointer;">Dispatched</span>';
                        } else {
                            return '<span id="status_' + full.id + '" class="btn btn-success sweet-success" data-id="' + full.id + '" style="cursor:pointer;">Received</span>';
                        }
                    }
                },
                 {
                    "targets": -1,
                    "render" : function (data , type, full, meta){
                          var html = "<a title='Edit Sample' href='/labexecutive/sample-edit/"+full.id+"' ><i class='fas fa-edit ' ></i></a>";
                                if(full.sample_report_count>0){
                                html +="<a title='sample Report' href='/labexecutive/sample-report/"+full.id+"' ><i class='fas fa-eye' ></i></a>";
                                 html +="<a title='Edit sample Report' href='/labexecutive/sample-report-edit/"+full.id+"' ><i class='far fa-edit' ></i></a>";
                                }
                          return html;
                    }
                } ],
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
            offerTable.buttons().container().appendTo('#exportListOffers');
            $(".dataTables_filter input").attr("placeholder", "Sample");
        }

        makeTable();
        /* Action offer request start */
    });
    $(document.body).on('click', '.ustatus', function() {
        Swal.fire({
                title: "Are you sure?",
                text: "Once received, you will not be able to chnage status!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var text = $(this).html();
                    var uid = $(this).attr('data-id');
                    var data = 'id=' + uid + '&text=' + text;
                    var url = '/api/labexecutive/change-sample-status';
                    var button = $(this);
                    if (text && uid) {
                        $.ajax({
                            url: url,
                            type: 'get',
                            data: data,
                            dataType: 'json',
                            beforeSend: function() {
                                $(button).html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                            },
                            success: function(response) {
                                $(button).text(response['sample_status']);
                                $(button).attr('class', response['status_class']);
                            },
                        });
                    }
                } else {

                }
            });

    });
</script>
@endsection