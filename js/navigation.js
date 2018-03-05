jQuery(document).ready(function() {
	var animationParams = {'duration': 200, 'easing': 'linear', 'queue': false};
	jQuery('.mob-menu-button').click(function(){
		jQuery('.mmul').fadeIn(animationParams);		 
	});
	jQuery('.mmul-close').click(function(){
		jQuery('.mmul').fadeOut(animationParams);
	});
	jQuery('.menu-item-has-children').click(function(){
		jQuery('.sub-menu').fadeOut(animationParams);
		jQuery(this).children('.sub-menu').fadeIn(animationParams);
	});
});