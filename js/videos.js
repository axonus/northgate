var Northgate = window.Northgate || {}; Northgate.Videos = Northgate.Videos || {};
Northgate.Videos = {
    init: function(){
    	console.log('Videos init');
    	Northgate.Videos.setupHandlers();
    	Northgate.Videos.setupFeed();
    },
    setupHandlers: function(){
    	
    },
    setupFeed: function(){
    	console.log('setupFeed');
    	var url = 'proxy.xml';
    	if(window.location.href.indexOf('northgate') > -1) {
    		url = 'proxy.php';
    	}
    	Northgate.Videos.getData(url);
    },
    getData: function(url){
        
		$.ajax({
			type: "GET",
			url: url,
			dataType: "xml",
			success: function(xml) {
				Northgate.Videos.handleSuccess(xml);
			}
		});

    },
    handleSuccess: function(xml){
		console.log('handleSuccess');
		var $list = $('#video-list');
		var html = '';
		$(xml).find('entry').each(function(index,entry){
			console.log(index, entry);
			html += Northgate.Videos.buildItemHtml(index, entry);
			
		});
		$list.html(html);
    },
    buildItemHtml: function(index, entry){
    	var $entry = $(entry);
    	var id = $entry.find('id').text();
    	var title = $entry.find('title:first').text();
    	var content = $entry.find('content:first').text();
    	var views = $entry.find('statistics').attr('viewCount');
    	var videoId = id.substring(42, 53);
    	var published = $entry.find('published').text();
    	var publishDate = new Date(published);
    	var publishDay = publishDate.getDate();
    	var publishMonth = publishDate.getMonth();
    	var today = new Date();
    	var todayDay = today.getDate();
    	var todayMonth = today.getMonth();
    	var liClass = '';
    	if(index==0){
    		liClass='first';	
    	}
    	var secPerDay = 86400000;
    	var diffSec = today - publishDate;
    	var dayDiff = Math.floor(diffSec/secPerDay);
    	
    	var publishText = '';
    	if(dayDiff==0){
    		publishText = 'Today';
    	}
    	else if(dayDiff==1){
    		publishText = 'Yesterday';
    	}
    	else if(dayDiff<7){
    		publishText = dayDiff + ' days ago';
    	}
    	else if(dayDiff<14){
    		publishText = '1 week ago';
    	}
    	else if(dayDiff<21){
    		publishText = '2 weeks ago';
    	}
    	else if(dayDiff<28){
    		publishText = '3 weeks ago';
    	}
    	else if(dayDiff<30){
    		publishText = '4 weeks ago';
    	}
    	else if(dayDiff<60){
    		publishText = '1 month ago';
    	}
    	else if(dayDiff<90){
    		publishText = '2 months ago';
    	}
    	else if(dayDiff<120){
    		publishText = '3 months ago';
    	}
    	else{
			publishText = 'More than 3 months ago!';
		}
    	var embedHtml = '<iframe class="youtube-player" type="text/html" width="93" height="93" src="http://www.youtube.com/embed/' + videoId + '?controls=0&showinfo=0&showsearch=0&modestbranding=1" frameborder="0"></iframe>';

		listItem = '';
		listItem += '		<li class="' + liClass + '">';
		listItem += '			<div class="video-thumb">' + embedHtml + '</div>';
		listItem += '			<div class="video-details">';
		listItem += '				<h3 class="video-title">' + title + '</h3>';
		listItem += '				<span class="video-description">' + content + '</span>';
		listItem += '				<span class="video-views">' + views + ' views</span>';
		listItem += '				<span class="video-date">' + publishText + '</span>';
		listItem += '			</div>';
		listItem += '		</li>';


    	console.log(listItem);
    	return listItem
	},
    
};
Northgate.Videos.init();

