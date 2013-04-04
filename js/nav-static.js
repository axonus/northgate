var Northgate = window.Northgate || {}; Northgate.Nav = Northgate.Nav || {};
Northgate.Nav = {
    init: function(){
    	alert('init' + $('#nav-main li').length);
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
    	alert('setupHandlers');
    	$('#nav-main li').on('click',function(){
			alert('clicked');
			var $this = $(this);
			Northgate.Nav.handleNav($this);
    		return false;	
    	});    	
    },
    handleNav: function($this){
    	alert('handleNav');
    	var name = $this.data('name');
    	Northgate.Nav.updateNav($this);
    	Northgate.Nav.updatePage(name);
    },
    updateNav: function($this){
    	alert('updateNav');
    	$('#nav-main li').removeClass('selected');
    	$this.addClass('selected');
    },
    updatePage: function(name){
    	alert(name);
		if (top.location!=self.location) {
			//alert(name);
			//console.log('iframe',name);
			//var frameId = '';
			var url='';
			//var language = Northgate.Nav.getParam('language;);
			//alert(language);
			/*
			var querystring = '';
			if(1==2){
				querystring = '?language=es';
			}
			*/
			switch(name){
				case 'main':
					url = 'customerlogin.php';
					//frameId = '#frame-main';
				break;
				case 'videos':
					url = 'video.php';
					//frameId = '#frame-videos';
				break;
				case 'stores':
					url = 'http://www.northgatemobile.com/store_locator';
					//frameId = '#frame-stores';
				break;
				case 'charity':
					url = 'charity.php';
					//frameId = '#frame-charity';
				break;
				case 'facebook':
					url = 'http://m.facebook.com/NorthgateGonzalezMarkets';
				break;
			}
			//url = url+querystring;
			//$('#section-nav',parent.document).find('.frame-content.current').removeClass('current').end().find(frameId).addClass('current');
			$('#frame-main', window.parent.document).attr('src',url);
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
    },
    
    getParam: function(name){
	  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	  var regexS = "[\\?&]" + name + "=([^&#]*)";
	  var regex = new RegExp(regexS);
	  var results = regex.exec(window.location.search);
	  if(results == null)
		return "";
	  else
		return decodeURIComponent(results[1].replace(/\+/g, " "));
	}
};
Northgate.Nav.init();

