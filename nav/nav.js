var Northgate = window.Northgate || {}; Northgate.Nav = Northgate.Nav || {};
Northgate.Nav = {
    init: function(){
    	//console.log('Nav 23 init');
    	Northgate.Nav.setupHandlers();
    	//Northgate.Nav.checkFrameStatus();
    },
    checkFrameStatus: function(){
    	if (top.location!=self.location) { 
		  // no frame
		  //console.log('no frame');
		  
		} else { 
		  //frame
		  //console.log('in frame');
		  $('#nav-main li a').css('width','20px');
		}
	},
    setupHandlers: function(){
    	$('#nav-main li').on('click',function(){
			var $this = $(this);
			Northgate.Nav.handleNav($this);
    		return false;	
    	});    	
    },
    handleNav: function($this){
    	var name = $this.data('name');
    	Northgate.Nav.updateNav($this);
    	Northgate.Nav.updatePage(name);
    },
    updateNav: function($this){
    	$('#nav-main li').removeClass('selected');
    	$this.addClass('selected');
    },
    updatePage: function(name){
		if (top.location!=self.location) {
			//alert(name);
			console.log('iframe',name);
			var frameId = '';
			switch(name){
				case 'main':
					//url = 'customerlogin.php';
					frameId = '#frame-main';
				break;
				case 'videos':
					//url = 'video.php';
					frameId = '#frame-videos';
				break;
				case 'stores':
					//url = 'http://www.northgatemobile.com/store_locator';
					frameId = '#frame-stores';
				break;
				case 'charity':
					//url = 'charity.php';
					frameId = '#frame-charity';
				break;
				case 'facebook':
					url = 'http://m.facebook.com/NorthgateGonzalezMarkets';
				break;
			}
			$('#section-nav',parent.document).find('.frame-content.current').removeClass('current').end().find(frameId).addClass('current');
			//$('#frame-content', window.parent.document).attr('src',url);
		}
		else{
			var callback = '';
			switch(name){
				case 'main':
					callback = 'callbackhome:whatever';
				break;
				case 'videos':
					callback = 'callbackvideo:whatever';
				break;
				case 'stores':
					callback = 'callbacklocator:whatever';
				break;
				case 'charity':
					callback = 'callbackcharity:whatever';
				break;
				case 'facebook':
					callback = 'callbackfacebook:whatever';
				break;
			}
			//console.log('callback: ' + callback);
			document.location.href=callback;
		}
    }
};
Northgate.Nav.init();

