$(window).load(function(){
  /*footer_bottom*/
    var f_height = $(".footer").outerHeight();
    var f_inner_height = $(".footer_inner").outerHeight();
    $(".footer").css("margin-top", (-1)*f_height);
    $(".d_footer").css("height", f_height);
    $(".base_layer").css("bottom", f_inner_height);
  /*x_footer_bottom*/
});

$(document).ready(function(){
	if ( $(".bxslider").length>0){
		$(".bxslider").bxSlider({
			auto:true
		});
	}

	$("select").selectmenu({handleWidth: 26});
  $('input[placeholder], textarea[placeholder]').placeholder();


  /*fixed_block*/
  	var fixed_block = $(".fixed_block");
      var fixed_block_height = $(".fixed_block").outerHeight();
   	var fixed_block_top = $(fixed_block).offset().top;
  	 window.onscroll = function() {
  	 	var pageY = window.pageYOffset || document.documentElement.scrollTop;
  	 	 if (pageY >= fixed_block_top) {
       		 $(fixed_block).addClass("fixed");
               $(".header").css("margin-bottom", fixed_block_height);
     		 } else {
       		 $(fixed_block, ".header").removeClass("fixed");
                $(".header").css("margin-bottom", '0');
     		 }
  	 }
  /*x_fixed_block*/

  /*catalog*/
      $(".product_item_pict img").hover(
          function(){
              $(this).parents(".product_item").find("h3 a").addClass("active");
          },
          function(){
              $(this).parents(".product_item").find("h3 a").removeClass("active");
          }
      );
  /*x_catalog*/

  $('.content_area table').each(function(){
      if (!$(this).hasClass('without_color')) {
          $("tbody tr:odd").css('background-color', '#f8f8f8');
      }
  })

  /*dynamic_pie*/
    function setPie(selectors){
        jQuery(selectors).css("behavior", "url(../PIE.htc)");
      };
      function unsetPie(selectors){
        jQuery(selectors).css("behavior", "none")
      };
      function resetPie(selectors){
          unsetPie(selectors);
          setPie(selectors);
      };

      /*ie7_or_ie8*/
      var old_ie = false, htmlclass_str;
      htmlclass_str = $("html").attr("class");
      if (typeof(htmlclass_str) != "undefined"){
        if ( (htmlclass_str.indexOf("ie8") + 1) || (htmlclass_str.indexOf("ie7") + 1) ) { old_ie = true; };
      }
     /*x_ie7_or_ie8*/

  $(".main_menu li.submenu").hover(
    function () {
      var submenu = $(this).find('ul');
      submenu.css("display","block");
      if (old_ie){
        $(this).find(".submenu_border").css("width", $(this).outerWidth()-2);
        resetPie(this);
        resetPie(submenu);
      }
  },
    function(){
      var submenu = $(this).find('ul');
      submenu.css("display","none");
    }
  );
  /*x_dynamic_pie*/
})