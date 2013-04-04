var Northgate = window.Northgate || {}; Northgate.Login = Northgate.Login || {};
Northgate.Login = {
    init: function(){
    	//console.log('Login2 init');
    	//console.log($('#login-page'));
    	//$('#login-page').css('height','400px').hide();
    	Northgate.Login.setupHandlers();
    	//Northgate.Login.setupPlaceholderText();
    	//Northgate.Login.setupValidation();
    	Northgate.Login.checkValidation('init');
    	//Northgate.Login.checkFrameStatus();
    },
    
    setupPlaceholderText: function(){
		//console.log('setupPlaceholderText');
		$('input[placeholderText]').each(function(index,item){
			var $this = $(item);
			var placeholderText = $this.attr('placeholderText');
			$this.val(placeholderText);
			//console.log($this.hasAttr('placeholderText'));
			//$this.css('outline','1px solid red');
			$this.on('focus',function(){
				Northgate.Login.handleFocus($this);
			});
			$this.on('blur',function(){
				Northgate.Login.handleBlur($this);
			});
		})
		
    },
    
    handleFocus: function($this){
    	//console.log('handleFocus');
    	var $this = $this;
    	var placeholderText = $this.attr('placeholderText');
    	var currentVal = $this.val();
    	//console.log('placeholderText',placeholderText);
    	//console.log('currentVal',currentVal);
    	if(placeholderText==currentVal){
    		//console.log('empty');
    		$this.val('');
    	}
    	else{
    		//console.log('not empty');	
    	}
    },
    
    handleBlur: function($this){
    	//console.log('handleBlur');
    	var $this = $this;
    	var placeholderText = $this.attr('placeholderText');
    	var currentVal = $this.val();
    	//console.log('placeholderText',placeholderText);
    	//console.log('currentVal',currentVal);
    	if(currentVal==''){
    		//console.log('empty');
    		$this.val(placeholderText);
    	}
    	else{
    		//console.log('not empty');	
    	}

    },
    
    checkFrameStatus: function(){
    	//console.log('checkFrameStatus');
    	if (top.location== self.location) { 
		  // no frame
		  //console.log('no frame');
		  
		} else { 
		  //frame
		  //console.log('in frame');
		  Northgate.Login.sizeContent();
		}
	},
	
   sizeContent: function(){
    	//console.log('sizeContent');
    	var $body = $('body');
    	var $header = $('#frame-header');
    	var $content = $('#loginPage');
    	var $nav = $('#frame-nav');
    	var bodyHeight = $body.innerHeight();
    	
    	contentHeight = 200;
    	$content.css('height',contentHeight+'px');
   },

    setupHandlers: function(){
    	$('#fieldset-phone-type input').on('change',function(){
			Northgate.Login.handleRadioChangePhone($(this));
			Northgate.Login.checkValidation('phone');
    	});
    	$('#address-type').on('change',function(){
			Northgate.Login.handleRadioChangeAddress($(this));
    	});
    	$('#btn-submit').on('click',function() {
			Northgate.Login.checkValidation('submit');
			return false;
		});
		
		$('#mobilenumber, #mobilenumber2').on('keyup',function(){
			//alert('a');
			Northgate.Login.checkValidation('field');
		});
		$('#email').on('keyup',function(){
			//alert('b');
			Northgate.Login.checkValidation('email');
		});
    },
    checkValidation: function(type){
    	//console.log('checkValidation');
    	var $form = $('#form-login');
    	$form.attr('class','');
    	var $addressTypeButton = $('#address-type');
    	var addressChecked = $addressTypeButton.prop('checked');
    	Northgate.Login.resetError();
    	Northgate.Login.checkPhone();
    	Northgate.Login.checkEmail(type);
    	if(type=='submit'){
    		Northgate.Login.handleLoginSubmit();
    	}
    	
    },

    checkEmail: function(type){
    	//console.log('checkEmail');
    	var $phoneType1 = $('#phone-type-1');
    	var $phoneType2 = $('#phone-type-2');
    	//console.log($phoneType2.prop('checked'));
    	if($phoneType2.prop('checked')){
    		Northgate.Login.verifyEmail(type);
    	}
    	
    },

    verifyEmail: function(type){
    	//console.log('verifyEmail: ' + type);
    	var $form = $('#form-login');
    	var $email = $('#email');
    	var emailVal = $email.val();
    	var isEmailValid = Northgate.Login.isEmailValid(emailVal);
    	if(emailVal=='' || isEmailValid==false){
    		//console.log('verify IF');
    		$form.addClass('form-invalid');
    		if(type!='init'){
    			$email.addClass('field-invalid').removeClass('field-valid');
    		}
    	}
    	else{
    		$email.addClass('field-valid').removeClass('field-invalid');
    	}
    	
    },

    isEmailValid: function(emailVal){
    	//console.log('isEmailValid');
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(emailVal) == false) {
			return false;
		}
		else{
			return true;	
		}
    },

    checkPhone: function(){
    	//console.log('checkPhone');
    	var $phone1 = $('#mobilenumber');
    	var $phone2 = $('#mobilenumber2');
    	var phone1Val = $phone1.val();
    	var phone2Val = $phone2.val();
    	var $form = $('#form-login');
    	var status = 'empty';
    	if( (phone1Val==phone2Val) && (phone1Val.match(/^\d{10}/) && phone2Val.match(/^\d{10}/)) ){
    		$phone1.addClass('field-valid').removeClass('field-invalid');
    		$phone2.addClass('field-valid').removeClass('field-invalid');
    	}
		else if(phone1Val.match(/^\d{10}/)){
			//console.log('if');
			if(phone2Val.length==0){
				//console.log('if if');
				$phone1.addClass('field-valid').removeClass('field-invalid');
				$form.addClass('form-invalid');
			}
			else if(phone2Val.length==10 && phone1Val==phone2Val){
				//console.log('if "else if"');
				$phone1.addClass('field-valid').removeClass('field-invalid');
			}
			else{
				//console.log('if else');
				$phone1.addClass('field-invalid').removeClass('field-valid');
				$phone2.addClass('field-invalid').removeClass('field-valid');
				Northgate.Login.displayError('phone-mismatch');
			}
		}
		else if(phone2Val.match(/^\d{10}/)){
			if(phone1Val.length==0){
				//console.log('if if');
				$phone2.addClass('field-valid').removeClass('field-invalid');
			}
			else if( phone1Val!=phone2Val ){
				$phone1.addClass('field-invalid').removeClass('field-valid');
				$phone2.addClass('field-invalid').removeClass('field-valid');
				Northgate.Login.displayError('phone-mismatch');
			}
		}
		else if(phone1Val=='' && (phone2Val=='')){
			$form.addClass('form-invalid');
		}
		else{
			//console.log('else');
			$phone1.addClass('field-invalid').removeClass('field-valid');
		}
    	
    },
    resetError: function(){
    	$errors = $('#error-messages');
    	$errors.attr('class','');
    },
    displayError: function(type){
    	$errors = $('#error-messages');
    	var $form = $('#form-login');
    	$errors.addClass('error-' + type);
    	$form.addClass('form-invalid');
    },
    handleRadioChangeAddress: function($this){
    	//alert($this.prop('checked'));
    	var $fieldset = $('#address-mailing');
    	var $email = $('#address-email');
    	if($this.prop('checked')){
			$email.hide('blind',1000, function(){
				$fieldset.show('blind',1000);
			});
    	}
    	else{
			$fieldset.hide('blind',1000, function(){
				$email.show('blind',1000);
			});
    	}
    	Northgate.Login.checkValidation();
    },
    handleRadioChangePhone: function($this){
    	var type = $this.attr('id');
    	var $fieldset = $('#fieldset-home');
    	if(type=='phone-type-1'){
    		$fieldset.hide('blind',1000);
    		$('#email').removeAttr('required');
    	}
    	else if(type=='phone-type-2'){
    		$fieldset.show('blind',1000);
    		$('#email').attr('required',true);
    	}
    	
    },
    
    handleLoginSubmit: function(){
    	var $form = $('#form-login');
    	if($form.hasClass('form-invalid')){
    		//console.log('form invalid');
			$('#error-messages').addClass('error-global');
    	}
    	else{
    		//console.log('form IS valid');
    		$('#error-messages').removeClass('error-global');
			var mobileNumber = $('#mobilenumber').val();
			var actionUrl = 'customersummary.php?android=true&mobilenumber='+mobileNumber;
			$form.attr('action',actionUrl).submit();
			document.location=actionUrl;
		}
    	//$form.submit();
    	
    	//document.location=actionUrl;
    },
    
    
    checkForm: function(){
    	alert('checkform');
    },
    setupValidation: function(){
		$('#form-login input#mobilenumber').on('keyup', function(){
			//alert($('#form-login input#mobilenumber').is(':invalid'));
		});
		/*
    	$('#form-login input#mobilenumber').on('change',function(){
			Northgate.Login.checkForm();
		});
		*/
    }

};
Northgate.Login.init();

