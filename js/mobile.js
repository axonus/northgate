var Northgate = window.Northgate || {}; Northgate.Mobile = Northgate.Mobile || {};
Northgate.Mobile = {
    init: function(){
    	//console.log('Mobile init');
    	//Northgate.Mobile.setupScroll();
    },
    setupScroll: function(){
    	alert('setupScroll');
		$('body').scroll(function() {
		  alert('scroll');
		});
    },

   sizeContent: function(){
    	//console.log('sizeContent');
    	var $body = $('body');
    	var $header = $('#frame-header');
    	var $content = $('#frame-content');
    	var $nav = $('#frame-nav');
    	var bodyHeight = $body.innerHeight();
    	var headerHeight = $header.innerHeight();
    	var navHeight = $nav.innerHeight();
    	var contentHeight = bodyHeight - (headerHeight + navHeight);
    	//console.log(bodyHeight);
    	//console.log(headerHeight);
    	//console.log(navHeight);
    	//console.log(contentHeight);
    	//contentHeight = 300;
    	$content.css('height',contentHeight+'px');
   }

};
Northgate.Mobile.init();

