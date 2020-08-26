<script src="{{ asset('js/vendor-all.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pcoded.min.js') }}"></script>
<script src="{{ asset('plugins/chart-am4/js/core.js') }}"></script>
<script src="{{ asset('plugins/chart-am4/js/charts.js') }}"></script>
<script src="{{ asset('plugins/chart-am4/js/animated.js') }}"></script>
<script src="{{ asset('plugins/chart-am4/js/maps.js') }}"></script>
<script src="{{ asset('plugins/chart-am4/js/worldLow.js') }}"></script>
<script src="{{ asset('plugins/chart-am4/js/continentsLow.js') }}"></script>
<script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>    
<script src="{{asset('js/pages/form-validation.js') }}"></script> 
<script src="{{asset('plugins/data-tables/js/datatables.min.js') }}"></script>
<script src="{{asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script> 
<script src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script src="{{asset('plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script> 
@stack('js')
<script>
	$('.dateclass').bootstrapMaterialDatePicker({ weekStart: 0,time: false});
	$('.timeclass').bootstrapMaterialDatePicker({ date: false,format: 'HH:mm'});
</script>


