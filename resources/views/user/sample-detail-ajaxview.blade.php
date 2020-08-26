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
            @foreach($algaetype as $key => $algaedata)
            <tr>
                <td width="50%">{{$key}}</td>
                <td width="50%">{{$algaedata->sum('perc_reads')}}%</td>
            </tr>
            @endforeach                        
        </tbody>
    </table>
</div>
<div class="col-12 col-lg-6 text-center">
   {!!$pie->html() !!}
</div>
{!! $pie->script() !!}