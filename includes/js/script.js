
$(document).ready(function(e) {
	$('.with-hover-text, .regular-link').click(function(e){
		e.stopPropagation();
	});
	
	/***************
	* = Hover text *
	* Hover text for the last slide
	***************/
	$('.with-hover-text').hover(
		function(e) {
			$(this).css('overflow', 'visible');
			$(this).find('.hover-text')
				.show()
				.css('opacity', 0)
				.delay(200)
				.animate(
					{
						paddingTop: '25px',
						opacity: 1
					},
					'fast',
					'linear'
				);
		},
		function(e) {
			var obj = $(this);
			$(this).find('.hover-text')
				.animate(
					{
						paddingTop: '0',
						opacity: 0
					},
					'fast',
					'linear',
					function() {
						$(this).hide();
						$( obj ).css('overflow', 'hidden');
					}
				);
		}
	);
	
	var img_loaded = 0;
	var j_images = [];
	
	/*************************
	* = Controls active menu *
	* Hover text for the last slide
	*************************/
	$('#slide-3 img').each(function(index, element) {
		var time = new Date().getTime();
		var oldHref = $(this).attr('src');
		var myImg = $('<img />').attr('src', oldHref + '?' + time );
		
		myImg.load(function(e) {
			img_loaded += 1;;
			if ( img_loaded == $('#slide-3 img').length ) {
				$(function() {
					var pause = 10;
					$(document).scroll(function(e) {
						delay(function() {
							
							var tops = [];
							
							$('.story').each(function(index, element) {
								tops.push( $(element).offset().top - 200 );
							});
				
							var scroll_top = $(this).scrollTop();
							
							var lis = $('.nav > li');
							
							for ( var i=tops.length-1; i>=0; i-- ) {
								if ( scroll_top >= tops[i] ) {
									menu_focus( lis[i], i+1 );
									break;
								}
							}
						},
						pause);
					});
					$(document).scroll();
				});
			}
		});
	});
	
});

/******************
* = Gallery width *
******************/
$(function() {
	var pause = 50; // will only process code within delay(function() { ... }) every 100ms.
	$(window).resize(function() {
		delay(function() {
				var gallery_images = $('#slide-3 img');
				
				var images_per_row = 0;
				if ( gallery_images.length % 2 == 0 ) {
					images_per_row = gallery_images.length / 2;
				} else {
					images_per_row = gallery_images.length / 2 + 1;
				}
				
				var gallery_width = $('#slide-3 img').width() * $('#slide-3 img').length;
				gallery_width /= 2;
				if ( $('#slide-3 img').length % 2 != 0 ) {
					gallery_width += $('#slide-3 img').width();
				}
				
				$('#slide-3 .row').css('width', gallery_width );
				
				var left_pos = $('#slide-3 .row').width() - $('body').width();
				left_pos /= -2;
				
				$('#slide-3 .row').css('left', left_pos);
			
			},
			pause
		);
	});
	$(window).resize();
});

var delay = (function(){
	var timer = 0;
	return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	};
})();

function menu_focus( element, i ) {
	if ( $(element).hasClass('active') ) {
		if ( i == 6 ) {
			if ( $('.navbar').hasClass('inv') == false )
				return;
		} else {
			return;
		}
	}
	
	enable_arrows( i );
		
	if ( i == 1 || i == 6 )
		$('.navbar').removeClass('inv');
	else
		$('.navbar').addClass('inv');
	
	$('.nav > li').removeClass('active');
	$(element).addClass('active');
	
	var icon = $(element).find('.icon');
	
	var left_pos = icon.offset().left - $('.nav').offset().left;
	var el_width = icon.width() + $(element).find('.text').width() + 10;
	
	$('.active-menu').stop(false, false).animate(
		{
			left: left_pos,
			width: el_width
		},
		1500,
		'easeInOutQuart'
	);
}

function enable_arrows( dataslide ) {
	$('#arrows div').addClass('disabled');
	if ( dataslide != 1 ) {
		$('#arrow-up').removeClass('disabled');
	}
	if ( dataslide != 6 ) {
		$('#arrow-down').removeClass('disabled');
	}
	if ( dataslide == 3 ) {
		$('#arrow-left').removeClass('disabled');
		$('#arrow-right').removeClass('disabled');
	}
}

/*************
* = Parallax *
*************/
jQuery(document).ready(function ($) {
	//Cache some variables
	var links = $('.nav').find('li');
	slide = $('.slide');
	button = $('.button');
	mywindow = $(window);
	htmlbody = $('html,body');
	
	//Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
	//easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
	function goToByScroll(dataslide) {
		var offset_top = ( dataslide == 1 ) ? '0px' : $('.slide[data-slide="' + dataslide + '"]').offset().top;
		
		htmlbody.stop(false, false).animate({
			scrollTop: offset_top
		}, 1500, 'easeInOutQuart');
	}
	
	//When the user clicks on the navigation links, get the data-slide attribute value of the link and pass that variable to the goToByScroll function
	links.click(function (e) {
		e.preventDefault();
		dataslide = $(this).attr('data-slide');
		goToByScroll(dataslide);
		$(".nav-collapse").collapse('hide');
	});
	
	//When the user clicks on the navigation links, get the data-slide attribute value of the link and pass that variable to the goToByScroll function
	$('.navigation-slide').click(function (e) {
		e.preventDefault();
		dataslide = $(this).attr('data-slide');
		goToByScroll(dataslide);
		$(".nav-collapse").collapse('hide');
	});
});

/***************
* = Menu hover *
***************/
jQuery(document).ready(function ($) {
	//Cache some variables
	var menu_item = $('.nav').find('li');
	
	menu_item.hover(
		function(e) {
			var icon = $(this).find('.icon');
			
			var left_pos = icon.offset().left - $('.nav').offset().left;
			var el_width = icon.width() + $(this).find('.text').width() + 10;
			
			var hover_bar = $('<div class="active-menu special-active-menu"></div>')
				.css('left', left_pos)
				.css('width', el_width)
				.attr('id', 'special-active-menu-' + $(this).data('slide') );
			
			$('.active-menu').after( hover_bar );
		},
		function(e) {
			$('.special-active-menu').remove();
		}
	);
});

/******************
* = Gallery hover *
******************/
jQuery(document).ready(function ($) {
	//Cache some variables
	var images = $('#slide-3 a');
	
	images.hover(
		function(e) {
			var asta = $(this).find('img');
			$('#slide-3 img').not( asta ).stop(false, false).animate(
				{
					opacity: .5
				},
				'fast',
				'linear'
			);
			var zoom = $('<div class="zoom"></div>');
			if ( $(this).hasClass('video') ) {
				zoom.addClass('video');
			}
			$(this).prepend(zoom);
		},
		function(e) {
			$('#slide-3 img').stop(false, false).animate(
				{
					opacity: 1
				},
				'fast',
				'linear'
			);
			$('.zoom').remove();
		}
	);
});

/******************
* = Arrows click  *
******************/
jQuery(document).ready(function ($) {
	//Cache some variables
	var arrows = $('#arrows div');
	
	arrows.click(function(e) {
		e.preventDefault();
		
		if ( $(this).hasClass('disabled') )
			return;
		
		var slide = null;
		var datasheet = $('.nav > li.active').data('slide');
		var offset_top = false;
		var offset_left = false;
		
		
		switch( $(this).attr('id') ) {
			case 'arrow-up':
				offset_top = ( datasheet - 1 == 1 ) ? '0px' : $('.slide[data-slide="' + (datasheet-1) + '"]').offset().top;
				break;
			case 'arrow-down':
				offset_top = $('.slide[data-slide="' + (datasheet+1) + '"]').offset().top;
				break;
			case 'arrow-left':
				offset_left = $('#slide-3 .row').offset().left + 452;
				if ( offset_left > 0 ) {
					offset_left = '0px';
				}
				break;
			case 'arrow-right':
				offset_left = $('#slide-3 .row').offset().left - 452;
				if ( offset_left < $('body').width() - $('#slide-3 .row').width() ) {
					offset_left = $('body').width() - $('#slide-3 .row').width();
				}
				break;
		}
		
		if ( offset_top != false ) {
			htmlbody.stop(false, false).animate({
				scrollTop: offset_top
			}, 1500, 'easeInOutQuart');
		}
		
		if ( offset_left != false ) {
			if ( $('#slide-3 .row').width() != $('body').width() ) {
				$('#slide-3 .row').stop(false, false).animate({
					left: offset_left
				}, 1500, 'easeInOutQuart');
			}
		}
	});
});


var colors = new Array(
  [62,35,255],
  [60,255,60],
  [255,35,98],
  [45,175,230],
  [255,0,255],
  [255,128,0]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
  
  if ( $===undefined ) return;
  
var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")";

 $('#gradient').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}

setInterval(updateGradient,10);

document.getElementById("menu-link-6").onclick = function () {
    location.href = "../logout.php";
};

$(document).ready(function(){
        var i = 1;
        $('#addItem').on("click",function(){
            var ni = document.getElementById('newItem');
        
        var newdiv = document.createElement('div');

        var numi = document.getElementById('theValue');

        var num = (document.getElementById('theValue').value -1)+ 2;

        numi.value = num;
        
        var inum = num+1;

        var divIdName = 'itemdet'+num;

        newdiv.setAttribute('id',divIdName);
        newdiv.setAttribute('name', divIdName);
        newdiv.innerHTML = '<h2>Item '+ inum + ' Details</h2>\
    <div class="form-group">\
    <label for="item" class="col-sm-3 control-label">\
    Item ID* \
    </label> \
    <div class="col-sm-9">\
    <input id="item" type="text" class="form-control" name="item'+ num + '" id="item' + num + '">\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="iName" class="col-sm-3 control-label">\
    Item Name* </label> \
    <div class="col-sm-9">\
    <input id="iName" class="form-control" type="text" maxlength="20" name="iName'+num+'" required>\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="iCat" class="col-sm-3 control-label">\
    Category* \
    </label>\
    <div class="col-sm-9">\
    <select name="iCategory'+num+'" id="category" class="form-control" required>\
        <option value="Batteries">Batteries</option>\
                                        <option value="Storage">Storage Devices</option>\
                                        <option value="Cords">Cords/Cabels</option>\
                                        <option value="Connectors">Connectors</option>\
                                        <option value="Monitors">Monitors</option>\
                                        <option value="CPUs">CPUs</option>\
                                        <option value="Peripherals">Peripherals</option>\
                                        <option value="Speakers">Speakers</option>\
    </select>\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="iConsum" class="col-sm-3 control-label">\
    Consumability*\
    </label> \
    <div class="col-sm-9">\
    <input id="iConsum" type="radio" name="iCon'+ num + '" value="1" checked>\
    Yes&nbsp\
    <input id="iConsum" type="radio" name="iCon'+ num + '" value="0">\
    No\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="rate'+ num + '" class="col-sm-3 control-label">\
    Rate* \
    </label> \
    <div class="col-sm-9">\
    <input class="form-control" type="number" name="rate'+ num + '" id="rate'+ num + '" required>\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="tax'+ num + '" class="col-sm-3 control-label">\
    Tax*\
    </label>\
    <div class="col-sm-9">\
    <input class="form-control tax" type="number" step="0.01" name="tax'+ num + '" id="tax'+ num + '" required>\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="amt'+ num + '" class="col-sm-3 control-label">\
    Amount \
    </label>\
    <div class="col-sm-9">\
    <input class="form-control" type="number" name="amt'+ num + '" id="amt'+ num + '" readonly>\
    </div>\
    </div>\
    <div class="form-group">\
    <label for="iQty'+ num + '" class="col-sm-3 control-label">\
    Quantity* \
    </label> \
    <div class="col-sm-9">\
    <input class="form-control qty" type="number" name="iQty'+ num + '" id="iQty'+ num + '" required>\
    </div>\
    </div>\
    <div id="items'+ num + '"></div>';
    console.log(newdiv.innerHTML);
    ni.appendChild(newdiv);
    });
});
    
    $(document).delegate(".tax","blur",function(){
            var id = $(this).attr('id');
            var idx = id[id.length-1];
            
            console.log(idx);
            var rate = parseFloat($('#rate'+idx).val());
            var tax = parseFloat($('#tax'+idx).val());
            var amt = rate+(rate*tax)/100;
            
            $("#amt"+idx).val(amt);
    });
    
    $(document).delegate('.qty', 'blur', function(){
            var id = $(this).attr('id');
            var qty = $(this).val();
            //console.log(this);
            var idx = id[id.length-1];
            console.log(qty);
            $("#items"+idx).empty();
            for(var i=0; i<qty; i++){
                var sid = "<center>Serial ID: <input type='text' name='sid"+idx+i+"'></center><br>";
                $("#items"+idx).append(sid);
            } 
    });


//var val = [];


    // function to disable/enable ACCEPT button if quantity of items requested = serial ids selected by Admin
    $(document).ready(function(){
        
        $(".serial").click(function(){
            
            var id = $(this).attr('id');
            var idx = id[id.length-1];
            
            console.log(id);
            
            $('.submit').prop('disabled', true);

            var qty = val[idx];
            console.log(qty);
            
            var sel = $(".serial :selected").length;
            console.log(sel);
            
            if(qty==sel){
               $('.submit').prop('disabled', false);
            }
        });
            
    });


    function blinker() {
        $('.service').fadeOut(500);
        $('.service').fadeIn(500);
    }

    setInterval(blinker, 1000);

    document.getElementById("menu-link-6").onclick = function () {
        location.href = "../logout.php";
    };

$(document).ready(function(){
    $(".ret_item").click(function () {
            var id = $(this).attr('id');
            console.log(id);
            var id1 = parseInt(id[id.length-1],10);

            $("#idx").val(id1);

            console.log($("#idx").val());
            console.log(id1);
            document.getElementById('ret_form').submit();
    });

});
