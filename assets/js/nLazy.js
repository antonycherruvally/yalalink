(function () {

	nLazy = function(){
		$('.nl-image[data-background]:visible').each(function(){
			var $this = $(this)
			var src = $this.data('background')
			var imageTop = $this.offset().top
			var windowSize = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
			var windowBottom = $(document).scrollTop() + windowSize
			if(imageTop <= windowBottom){
				$this.addClass('nl-loading')
				$img = $('<img>').attr('src', src).on('load', function(){
					$(this).remove()
					$this
						.css({
							'opacity': 0,
							'background-image': 'url(' + src + ')'
						})
						.removeClass('nl-loading')
						.addClass('nl-loaded')
						.animate({
							'opacity': 1
						}, 'fast')
						.removeAttr('data-background')
				})
			}
		})
	}

	$(window).scroll(nLazy)

})()