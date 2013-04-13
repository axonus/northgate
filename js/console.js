var Northgate = window.Northgate || {}; Northgate.Console = Northgate.Console || {};
console = window.console || {}; //console.log = //console.log || {};
Northgate.Console = {
	useConsole:true,
	last4Keys:[],
	valid4Keys:[37,39,37,39],//left arrow,right arrow,left arrow,right arrow
    init: function(){
    	//console.log('Console init: ',Northgate.Console.useConsole);
    	if(Northgate.Console.useConsole && $('.console').length>0){
    		Northgate.Console.setupHandlers();
    	}
    	else{
    		//console.log('useConsole False or no console element');	
    	}
	},
    setupHandlers: function(){
    	//console.log('Console setupHandlers');
    	$(document).on('keyup',function(e){
    		Northgate.Console.checkKeys(e);
    	});
	},
	checkKeys:function(e){
		var code = e.which;
		domConsole = Northgate.Console;
		last = domConsole.last4Keys;
		lastLen = last.length;
		valid = domConsole.valid4Keys;
		validLen = valid.length;
		//console.clear();
		//console.log('code',code);
		//console.log('last',last);
		//console.log('lastLen',lastLen);
		//console.log('validLen',validLen);
		last.push(code);
		//console.log('////after//////');
		last = domConsole.last4Keys;
		lastLen = last.length;
		//console.log('valid',valid);
		//console.log('last',last);
		//console.log('lastLen',lastLen);
		//console.log('//////////');
		if(last.length>validLen){
			//console.log('is now longer');
			last.splice(0,1);
			last = domConsole.last4Keys;
			lastLen = last.length;
			//console.log('last',last);
			//console.log('valid',valid);
			//console.log('lastLen',lastLen);
		}
		if(Northgate.Console.last4Keys.toString()==Northgate.Console.valid4Keys.toString()){
			//console.log('now it matches');
			Northgate.Console.toggleConsole();
		}
	},

	toggleConsole:function(){
		var $console = $('.console');
		var displayVal = $console.css('display');
		if(displayVal=='none'){
			//console.log('is none');
			$console.css('display','block');
		}
		else if(displayVal=='block'){
			//console.log('is block');
			$console.css('display','none');
		}
		Northgate.Console.last4Keys = [];
	}
};

$( document ).ready(function() {
  Northgate.Console.init();
});
