/****
Techmatcher modal plugin
1) Specify the element you want shown inside the modal box (link, img, etc)

2) Specify the element you want the modal to cover (form, div, etc)

options:
	
top_offset:
	- A way to tweak the top position of the modal

left_ofset:
	- A way to tweak the left position of the modal
****/
(function ($) {
  $.fn.tmModal = function (overlay, options) {
    var element = this;
    
    settings = $.extend({
     top_offset: 0,
     left_offset: 0
  }, options);

    element.each(function(){
    	createModal();
    	$(window).resize(function(){
    		resetPosition(overlay);
    	});
    });
    
    return element;
	
	function createModal(){		
		//get dimensions of element
		var e_width = $(element).outerWidth();
		var e_height = $(element).outerHeight();
		var e_contents = $(element).html();
		//take the original element off of the page
		$(element).remove();
		
		//get dimensions of element we will overlay
		var o_width = $(overlay).outerWidth();
		var o_height = $(overlay).outerHeight();
		var o_pos = $(overlay).offset();
		
		var t_pos = (o_pos.top + settings.top_offset);
  		var l_pos = (o_pos.left + settings.left_offset);
		
		$("body").append("<div class='tmm_Modal'></div><div class='tmm_content'>"+e_contents+"</div>");
		
		//set up the modal box
		
  		//subtract padding value of modal window to set the height correctly
  		var m_o_width = $(".tmm_Modal").outerWidth();
  		var m_o_height = $(".tmm_Modal").outerHeight();
  		
  		var m_width = $(".tmm_Modal").width();
  		var m_height = $(".tmm_Modal").height();
  		
  		var p_w_offset = m_o_width - m_width;
  		var p_h_offset = m_o_height - m_height;
  		
  		var corrected_width = (o_width - p_w_offset);
  		var corrected_height = (o_height - p_h_offset);
  		
  		
  		$(".tmm_Modal").css({"width": corrected_width + "px", "height": corrected_height + "px", "top": t_pos + "px", "left": l_pos + "px"});
  		
  		
  		var contents_center_height = (t_pos + (corrected_height /2)) - e_height / 2;
  		
  		var contents_center_width = (l_pos + (corrected_width /2)) - e_height / 2;
  		
  		$(".tmm_content").css({"width": corrected_width + "px", "height": e_height + "px", "top": contents_center_height + "px", "left": l_pos + "px"});
  		
  		  		
	}
	
	function resetPosition(overlay)
	{
		var o_pos = $(overlay).offset();
		var o_width = $(overlay).outerWidth();
		var o_height = $(overlay).outerHeight();
			
		var t_pos = (o_pos.top + settings.top_offset);
  		var l_pos = (o_pos.left + settings.left_offset);
  		
  		//move link box 
  		var modal_pos = $(".tmm_Modal").offset();
  		
  		var link_pos = $(".tmm_content").offset();
  		
  		var left_diff = link_pos.left - modal_pos.left;
  		
  		$(".tmm_Modal").css({"top": t_pos + "px", "left": l_pos + "px"});
  		
  		$(".tmm_content").css({"left": (l_pos - left_diff) + "px"});
	}
  };
})(jQuery);