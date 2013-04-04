var Northgate = window.Northgate || {}; Northgate.Stores = Northgate.Stores || {};
Northgate.Stores = {
    init: function(){
    	console.log('Stores init');
    	Northgate.Stores.setupHandlers();
    },
    setupHandlers: function(){
    	console.log('setupHandlers' + $('.ui-link-inherit').length);
    	$('.ui-link-inherit').each(function(){ console.log($(this).text()); });
    	
		$('.ui-link-inherit').ready(function() {
		  console.log('2 setupHandlers' + $('.ui-link-inherit').length);
		});
    }
};
Northgate.Stores.init();

