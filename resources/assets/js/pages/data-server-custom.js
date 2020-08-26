$(document).ready(function() {
        // [ Server side processing Data-table ]
        $('#user-list').DataTable({
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "ajax":{
                url: '/api/userlist',
                type: 'GET'
            },
            "columns": [
                    {"data": "user_id","orderable" : true},
                    {"data": "first_name","orderable" : true},
                    {"data": "last_name","orderable" : true},
                    {"data": "email","orderable" : true},
                    {"data": "phone_no","orderable" : true},
                    {"data": "city","orderable" : true},
                    {"data": "status","orderable" : true},
                    {"data": "created_at","orderable" : true},
                    {"data": "action"}
            ],
             "columnDefs": [
              {
                "targets" : 6,
                "render" : function (data , type, full, meta){
                      if(full.status==1){
                          return 'Active';
                      }else{
                          return 'InActive';
                      }
                }
              },
                {
                  "targets" : -1,
                  "render" : function (data , type, full, meta){

                      return "<a title='edit' href='user/edit/"+full.user_id+"' style='color:#000'><i class='fas fa-edit'></i></a> | <a title='delete' style='color:#000' class='delete'  data-id='"+full.user_id+"' href='javascript:void(0)'><i class='fas fa-trash '></i></a>"
                  }
              },
          ],
         
        });
});
