function myFunction(x) {
  x.classList.toggle("change");
}


$(".tg_icon").on('click', function(event){
	event.stopPropagation();
	$(".h-right").toggleClass("left0")
})
$("body").on('click', function(){
	$(".h-right").removeClass("left0");
	$(".tg_icon").removeClass("change");
})





$(document).ready(function() {
    var sectionheight = $(window).height();
    var headerheight = $("header").height();
    var footerheight = $("footer").height();
    var totalheight = headerheight + footerheight + 1;  
    $(".db_sec").css("minHeight", sectionheight  - totalheight);
});

$(window).resize(function(){
    var sectionheight = $(window).height();
    var headerheight = $("header").height();
    var footerheight = $("footer").height();
    var totalheight = headerheight + footerheight + 1;  
    $(".db_sec").css("minHeight", sectionheight  - totalheight);
});





$(document).ready(function(){
    $('#op_selector').on('change', function() {
      if ( this.value == 'Algae')
      {
        $('#algae_select').show();
        $(".all_info").hide();
        $(".select_info").show();
      }else{
        $('#algae_select').hide();
        $(".all_info").show();
        $(".select_info").hide();
      }
    });
});


