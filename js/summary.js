var Northgate = window.Northgate || {}; Northgate.Summary = Northgate.Summary || {};
Northgate.Summary = {
    init: function(){
    	//console.log('Summary init');
    	//alert('init');
    	Northgate.Summary.setupAnimation();    
    },
    setupAnimation: function(){
    	//console.log('setupAnimation');
		$.fn.onAvailable = function(fn){
			var sel = this.selector;
			var timer;
			var self = this;
			if (this.length > 0) {
				fn.call(this);
			}
			else {
				timer = setInterval(function(){
					if ($(sel).length > 0) {
						fn.call($(sel));
						clearInterval(timer);  
					}
				},50);  
			}
		};
		$(".progress-desc.progress-applied").onAvailable(function(){
			Northgate.Summary.animateBar();
		});
    },
    animateBar: function(){
		var $bar = $('#progress-applied');
		var progress = $bar.data('progress');
		$bar.animate({
			width: progress + '%'
		  }, 500);
		
		
    }
};
Northgate.Summary.init();

