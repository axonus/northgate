var Northgate = window.Northgate || {}; Northgate.Nav = Northgate.Nav || {};
Northgate.Nav = {
    init: function(){
    	console.log('Nav init');
    	Northgate.Nav.setupHandlers();
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
		console.log('callback: ' + callback);
		document.location.href=callback;
    }
};
Northgate.Nav.init();

