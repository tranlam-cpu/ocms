


$(document).ready(function() {
	
	$('.view-home-1-content').hover(()=>{
		if($('.view-home-1-midcontent').hasClass('view-home-1-midcontent-show')){
			$('.view-home-1-midcontent').removeClass('view-home-1-midcontent-show')
			$('.end').removeClass('hidden')
		}else{
			$('.view-home-1-midcontent').addClass('view-home-1-midcontent-show')
			$('.end').addClass('hidden')
		}
		
	})


	// hover in category 200ms => get category
	var timer;

	$('.category-nav').hover((eventObj)=>{
			timer=setTimeout(()=>{
				getCategory(eventObj.target.id)
			},100);

		},
			function () {
	            return ;
	        }
		).mouseleave(function(){
			clearTimeout(timer);
		});
		

	//using ajax
		function getCategory(id){
			$.request(
			'onDetailscategory',
			{
				data: {id: id},
				success: function(data) {
					$('#Details').html(data['#Details'])
			    	
			        
				}
			})
		}
	
		

});
