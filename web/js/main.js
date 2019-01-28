function mobileCheck(){
	var winWidth=$(window).width();
	if (winWidth<=768) {
		$("#sidebar").after($("#body .pagination:first"))
	} else {
		$(".products-wrap").before($("#body .pagination:first"))
	}
}

$(document).ready(function() {
	$("input[type=checkbox]").crfi();
	$("select").crfs();
	$("#slider ul").bxSlider({
		controls: false,
		auto: true,
		mode: 'fade',
		preventDefaultSwipeX: false
	});
	$(".last-products .products").bxSlider({
		pager: false,
		minSlides: 1,
		maxSlides: 5,
		slideWidth: 235,
		slideMargin: 0
	});
	$(".tabs .nav a").click(function() {
		var container = $(this).parentsUntil(".tabs").parent();
		if (!$(this).parent().hasClass("active")) {
			container.find(".nav .active").removeClass("active")
			$(this).parent().addClass("active")
			container.find(".tab-content").hide()
			$($(this).attr("href")).show();
		};
		return false;
	});
	$("#price-range").slider({
		range: true,
		min: 0,
		max: 5000,
		values: [ 500, 3500 ],
		slide: function( event, ui ) {
			$(".ui-slider-handle:first").html("<span>$" + ui.values[ 0 ] + "</span>");
			$(".ui-slider-handle:last").html("<span>$" + ui.values[ 1 ] + "</span>");
		}
	});
	$(".ui-slider-handle:first").html("<span>$" + $( "#price-range" ).slider( "values", 0 ) + "</span>");
	$(".ui-slider-handle:last").html("<span>$" + $( "#price-range" ).slider( "values", 1 ) + "</span>");
	$("#menu .trigger").click(function() {
		$(this).toggleClass("active").next().toggleClass("active")
	});

	mobileCheck();
	$(window).resize(function() {
		mobileCheck();
	});
});

$('.add-cart').on('click', function (event) {
	event.preventDefault();
	let id = $(this).data('id');
	console.log(id);

	 $.ajax({
	 	url: '/cart/add',
	 	data: {id: id},
	 	type: 'GET',
	 	success :function () {

	 		$('.menu-quantity').html(+$('.menu-quantity').html()+1);

	//		alert('succes');
	//		return true;
	 	},
	 	error :function () {
	 		alert('error');
	 	}
	 })
})
 //удаляем товар из корзины по нажатию на крестик
$('.cart-table').on('click', '.delete', function () {
	let id = $(this). data('id');
	//console.log(id);
	$.ajax({
		url: '/cart/delete',
		data: {id: id},
		type: 'GET',
		success :function (res) {
			$('#body').html(res);
				if($('.total-quantity').html()>0){
					$('.menu-quantity').html($('.total-quantity').html());
				}else{
					$('.menu-quantity').html('0');
				}
		},
		error :function () {
			alert('error');
		}
	})
})

$('.cart-table').on('click', '.btn-order', function () {
	$.ajax({
		url: '/cart/order',
		type: 'GET',
		success :function (res) {
			$('#order .modal-content').html(res);
			//$('#cart').modal('hide');
			//$('#order').modal('show');
		},
		error :function () {
			alert('error');
		}
	})
})