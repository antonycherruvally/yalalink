var apiUrl = baseurl + 'api/?';
var listingsuri;

// check if the current device
// is on mobile
function isMobile() {
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
		return true;
	}
	return false;
}

// check if the current page
function isPage( str ) {
	str = '/' +  str;
	if( str == window.location.pathname ) {
		return true;
	}
	return false;
}

function isPageWildCard( wildcard ) {
	var str = window.location.pathname;
	if( str.indexOf(wildcard) !== -1 ) {
		return true;
	}
	return false;
}

// parse json object
function parse( obj ) {
	return jQuery.param(obj);
}

// logger
function log( str, table = false ) {
	// log using table
	if( table ) {
		console.table( str );
		return;
	}
	// basic log
	console.log( str );
	return;
}

function copyLink( str ) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val(str).select();
	document.execCommand("copy");
	$temp.remove();
	alertSuccess('Link copied.');
}

// translate arabic character to readable
function utf8Decode(utf8String) {
	if (typeof utf8String != 'string') throw new TypeError('parameter ‘utf8String’ is not a string');
	// note: decode 3-byte chars first as decoded 2-byte strings could appear to be 3-byte char!
	const unicodeString = utf8String.replace(
		/[\u00e0-\u00ef][\u0080-\u00bf][\u0080-\u00bf]/g,  // 3-byte chars
		function(c) {  // (note parentheses for precedence)
			var cc = ((c.charCodeAt(0)&0x0f)<<12) | ((c.charCodeAt(1)&0x3f)<<6) | ( c.charCodeAt(2)&0x3f);
			return String.fromCharCode(cc); }
	).replace(
		/[\u00c0-\u00df][\u0080-\u00bf]/g,                 // 2-byte chars
		function(c) {  // (note parentheses for precedence)
			var cc = (c.charCodeAt(0)&0x1f)<<6 | c.charCodeAt(1)&0x3f;
			return String.fromCharCode(cc); }
	);
	return unicodeString;
}

// format the descrption
function formatDesc( str, limit = 300 ) {
	if( str == null ) { return null; }
	return utf8Decode(str.substring(0, limit)).replace(/<\/?[^>]+(>|$)/g, "");
}

// Jobs Listings

function makeJobsListings( data, limit = 10 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				c++;
            
				if(res.img == "https://yalalink.com/assets/front_end/images/no_image_available.jpg" && res.gender == 'Male')
				{
					res.img = "assets/front_end/images/malejob.jpg" ;
				}
				if(res.img == "https://yalalink.com/assets/front_end/images/no_image_available.jpg" && res.gender == '')
				{
					res.img = "assets/front_end/images/3352.jpg" ;
				}
				if(res.img == "https://yalalink.com/assets/front_end/images/no_image_available.jpg" && res.gender == 'Any Gender')
				{
					res.img = "assets/front_end/images/malejob.jpg" ;
				}
				if(res.img == "https://yalalink.com/assets/front_end/images/no_image_available.jpg" && res.gender == 'Female')
				{
					res.img = "assets/front_end/images/femalejob.jpg" ;
				}
				
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+res.img+`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="#" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
					</div>
					
					<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
					
						<p class="card-text">`+ formatDesc(description, 100) +` ...</p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a></span>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun" id="`+ res.id +`" data-groups="post-results-list" src="`+res.img+`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<a href="`+ url +`"><p class="card-text-list-main">`+ description +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							<tr>
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+res.img+`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							<a href="`+ url +`"><p class="card-text">`+ description +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12" style="margin-top: -3px;">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							   </tr>
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

// Services
function makeServicesListings( data, limit = 20 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
					<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">`+ res.likes +`</span>
							<span style="margin-left: 34px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						
						<p class="card-text">`+ formatDesc(description,100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun" id="`+ res.id +`" data-groups="post-results-list" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<p class="card-text-list-main">`+ description +`...</p>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							<p class="card-text">`+ description +`</p>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a>  
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

// Education
function makeEducationListings( data, limit = 20 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
					<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
					<a href="`+ url +`">
						<img class="card-img-top gridmobviewimg instarun" ondblclick="test()" id="`+ res.id +`" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
								
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">0</span>
							<span style="margin-left: 34px;"><a href="whatsapp://send?text=`+ res.url +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="twitter://post?message=`+ res.url +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description,100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
					
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>

						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
							
							<a href="`+ url +`">
								<img class="card-img-top-grid" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
							</a>
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<p class="card-text-list-main">`+ description +`...</p>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						   
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
						<a href="`+ url +`">
							<img class="card-img-top-list" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
						</a>
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<p class="card-text">`+ description +`</p>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						  
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

// health care listings
function makeHealthcareListings( data, limit = 20 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
					<a href="`+ url +`">
						<img class="card-img-top gridmobviewimg instarun" ondblclick="test()" id="`+ res.id +`" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
								
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">0</span>
							<span style="margin-left: 34px;"><a href="whatsapp://send?text=`+ res.url +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="twitter://post?message=`+ res.url +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description,100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
					
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>

						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
							
							<a href="`+ url +`">
								<img class="card-img-top-grid" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
							</a>
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<p class="card-text-list-main">`+ description +`...</p>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						   
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
						<a href="`+ url +`">
							<img class="card-img-top-list" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
						</a>
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<p class="card-text">`+ description +`</p>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						  
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}


// women and beauty
function makeWomenbeautyListings( data, limit = 20 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
					<a href="`+ url +`">
						<img class="card-img-top gridmobviewimg instarun" ondblclick="test()" id="`+ res.id +`" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
								
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">0</span>
							<span style="margin-left: 34px;"><a href="whatsapp://send?text=`+ res.url +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="twitter://post?message=`+ res.url +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description,100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
					
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>

						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
							
							<a href="`+ url +`">
								<img class="card-img-top-grid" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
							</a>
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<p class="card-text-list-main">`+ description +`...</p>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						   
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
						<a href="`+ url +`">
							<img class="card-img-top-list" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
						</a>
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<p class="card-text">`+ description +`</p>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						  
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}


// housemaids
function makeHousemaidsListings( data, limit = 20 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
					<a href="`+ url +`">
						<img class="card-img-top gridmobviewimg instarun" ondblclick="test()" id="`+ res.id +`" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
								
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">0</span>
							<span style="margin-left: 34px;"><a href="whatsapp://send?text=`+ res.url +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="twitter://post?message=`+ res.url +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description,100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
					
						
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>

						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
							
							<a href="`+ url +`">
								<img class="card-img-top-grid" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
							</a>
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<p class="card-text-list-main">`+ description +`...</p>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						   
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
						<a href="`+ url +`">
							<img class="card-img-top-list" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
						</a>
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<p class="card-text">`+ description +`</p>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_4678" href="login" id="4678"><i class="far fa-heart" aria-hidden="true"></i></a> 
									<a class="unfavorites unfavorites_4678 d-none" href="login" id="4678"><i class="fa fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-4678" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						  
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

//Computer Listings

function makeComputerListings( data, limit = 20 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">`+ res.likes +`</span>
							<span style="margin-left: 34px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+formatDesc(description,100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a>  
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun" id="`+ res.id +`" data-groups="post-results-list" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<a href="`+ url +`"><p class="card-text-list-main">`+ description +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						   
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							<a href="`+ url +`"><p class="card-text">`+ description +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
						  
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}


// PHONE LISTINGS
function makePhoneListings( data, limit = 10 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card mobcardview" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					<div class="card-body">
					
						<!----Mobile icons social--->
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">`+ res.likes +`</span>
							<span style="margin-left: 34px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<!--------end------>
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description, 100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span class ="year" style="color: black;font-size: 13px;"><a href="phones/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i>`+ res.year +`</a></span>
					<span class ="kilometer" style="color: black;font-size: 13px;"><a href="phones/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i>`+ res.color +`</a> </span>
						
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun listimgauto" id="`+ res.id +`" data-groups="post-results-list" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<a href="`+ url +`"><p class="card-text-list-main">`+ description +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							<tr>
							<td>
							<span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.year +`  </span></td>
							<td> <span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.color +`</span></td>
							 
							   </tr>
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
							<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							<a href="`+ url +`"><p class="card-text">`+ description +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							<tr>
							<td>
							<span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.year +`  </span></td>
							<td> <span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.color +`</span></td>
							
							   </tr>
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

// ELECTRONICS LISTINGS
function makeElectroListings( data, limit = 10 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var id 			= res.id;
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					<div class="card-body">
					<!----Mobile icons social--->
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
								
								<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							<span class="count-like-`+ res.id +`">0</span>
							<span style="margin-left: 34px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0);" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							<!--------end------>
						<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description, 100) +` ...</p>
					</div>
						<div class="bottom">
							<div class="rating"> 
								<a class="favorites favorites_`+ res.id +` gridfav" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun" id="`+ res.id +`" data-groups="post-results-list" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<a href="`+ url +`"><p class="card-text-list-main">`+ description +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<a href="`+ url +`"><p class="card-text">`+ description +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>

							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}
// CLASSIFIEDS LISTINGS
function makeClassifiedListings( data, limit = 10 ) {
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			var featHtml ='<img class="img_featured" src="uploads/view/featured.png" alt="" width="50px">';
			var featHtmlgrid ='<img class="img_featured_grid" src="uploads/view/featured.png" alt="" width="50px">';
			var featHtmllistsmall = '<img class="img_featured_listsmall" src="uploads/view/featured.png" alt="" width="50px">';
			var img_tic = '<img src="uploads/view/tic.png" alt="" width="10px" height="10px" style="height:none">';
			var img_tic1 = '<img src="uploads/view/tic.png" alt="" width="10px" height="10px" style="height:none">';
			var img_tic2 = '<img src="uploads/view/tic.png" alt="" width="10px" height="10px" style="height:none">';
			var email;
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				c++;
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">
					<div>
					<div class="card-body">
					
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
							<span class="count-like-`+ res.id +`">`+ res.likes +`</span>
							<span style="margin-left: 8px;"><a href="`+ whatsappUrl +`"  data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="#" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')"  data-placement="bottom" title="Copy Link" data-original-title="Copy Link"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
							
							<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2">`+ curr +` `+ price +`</h5>
						<p class="card-text">`+ formatDesc(description, 100) +` ...<br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a></span>
						</div>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="javascript:void(0);" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
					   <span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun" id="`+ res.id +`" data-groups="post-results-list" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<a href="`+ url +`"><p class="card-text-list-main">`+ description +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="javascript:void(0);" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
							<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							<a href="`+ url +`"><p class="card-text">`+ description +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="javascript:void(0);" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>

							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}
// AUTO LISTINGS
function makeAutoListings( data, limit = 10 ) {
	var featHtml ='<img class="img_featuredauto" src="uploads/view/featured.png" alt="" width="50px">';
	var featHtmlgrid ='<img class="img_featured_gridauto" src="uploads/view/featured.png" alt="" width="50px">';
	var featHtmllistsmall = '<img class="img_featured_listsmallauto" src="uploads/view/featured.png" alt="" width="50px">';
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				var title_en    = res.title_en;
				var url         = res.url;
				var img         = res.img;
				var curr        = currency;
				var price       = res.price;
				var description = formatDesc(res.description);
				var dateAdded   = res.dateAdded;
				var whatsappUrl = "whatsapp://send?text=" + url;
				var twitterUrl = "twitter://post?message=" + url;
				c++;

				if( res.featured  < 1 ) {
					featHtml = "";
					featHtmlgrid = "";
					featHtmllistsmall = "";
					background = "#dadad261" ;
				}
				
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
				var post_results = `
				<div class="col col-sm-6 col-md-4 col-xs-12">
					<div class="card" style="border: 1px solid #2d2e2e47 !important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
						</div>
						<img class="card-img-top gridmobviewimgauto instarun" id="`+ res.id +`" data-groups="post-results" src="`+ img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
						` + featHtmlgrid + `
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<a class="unfavorites unfavorites_`+ res.id +` d-none" href="login" id="`+ res.id +`"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="javascript:void(0);" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
					</div>
					
					<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2"><a href="`+ res.url +`" style="color:red">`+ curr +` `+ price +`</a></h5>
						<p class="card-text"><a href="`+ res.url +`">`+ formatDesc(description, 100) +` ...</a></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a></span>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-`+ res.id +` gridcnt" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bedroom" style="color:#00000061;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;`+ res.year +`  </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bathroom" style="color:#00000061;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;`+ res.kilometers +`</span>
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="`+ res.url +`" title="Garage" style="color:#00000061;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ res.color +`</span>
								<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000061;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ formatDesc(res.horsepower,3) +`</span>-->
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000061;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;`+ formatDesc(res.spec,3) +`</a></span>-->
								 <!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000061;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ res.bodytype +`</span>-->
						</div>
					</div>
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
							
								<img class="card-img-top-grid instarun listimgauto" id="`+ res.id +`" data-groups="post-results-list" src="`+ img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								<!--<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">-->
								` + featHtml + `
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ url +`">`+ title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ price +`</h5>
								<a href="`+ url +`"><p class="card-text-list-main">`+ description +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
							<tr>
							<td>
							<span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.year +`  </span></td>
							<td> <span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.kilometers +`</span></td>
							  <td style="padding-right: 28px;"> <span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.color +`</span></td>
							  <td><span class ="pool" style="color: #00000096;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000061;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ formatDesc(res.horsepower,3) +`</span></td>
								<td><span class ="pool" style="color: #00000096;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000061;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;`+ formatDesc(res.spec,3) +`</a></span></td>
								 <!--<td><span class ="pool" style="color: #00000096;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000061;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ res.bodytype +`</span></td>-->
							   </tr>
							</tbody>
							<table>                         
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
							<!--<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">-->
							` + featHtmllistsmall + `
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ url +`">`+ title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<a href="`+ url +`"><p class="card-text">`+ description +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12" style="margin-top: -3px;">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ dateAdded +`</span></td>
							</tr>
<tr>
							<td>
							<span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.year +`  </span></td>
							<td> <span style="color: #00000096;font-size: 13px;"><a href="auto/vicolor: #00000096;ew/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.kilometers +`</span></td>
							  <td style="padding-right: 9px;"> <span style="color: #00000096;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>&nbsp;`+ res.color +`</span></td>
							   <td><span class ="pool" style="color: #00000096;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000061;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ formatDesc(res.horsepower,3) +`</span></td>
								<td><span class ="pool" style="color: #00000096;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000061;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;`+ formatDesc(res.spec,3) +`</a></span></td>
								<!-- <td><span class ="pool" style="color: #00000096;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000061;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ res.bodytype +`</span></td>-->
							   </tr>
							   </tr>
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 4  && c < 6) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
						</div>
					`);
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

// create pagination
function makePagination( data, template = "getListings" ) {
	var pages = Math.ceil(data.length / 20);
	$(".page-numbers .pagination").empty();
	$('#pagination-demo').twbsPagination('destroy');
	$('#pagination-demo').twbsPagination({
		initiateStartPageClick:false,
		totalPages: pages ? pages : 1,
		visiblePages: 3,
		next: 'Next',
		prev: 'Prev',
		onPageClick: function (event, page) {
			$.getJSON( apiUrl + listingsuri + "&page=" + (page - 1), function( data ) {
				window[template](data);
				initTaps(data);
			});
			$("html, body").animate({ scrollTop: 650 }, "slow");
		}
	});
	initTaps(data);
}

/**
 *  instagram double click/tap heart
 *  @param string clickOn
 *  @param string hearId
 *  @return void
 */
var instaTaps = 0;
var tapedTwice = false;
function tickHeart( elem ) {
	if( $(elem).children().hasClass('fa') ) {
		$(elem).children().addClass('far');
		$(elem).children().removeClass('fa');
	}else{
		$(elem).children().addClass('fa');
		$(elem).children().removeClass('far');
	}
}

function initTaps( data ) {
	if( data.length > 0 ) {
		for (var i = 0; i < data.length; i++) {
			var elem = document.getElementById(data[i].id);
			if(elem){
				elem.addEventListener('touchstart', tapHandler);
			}		
		}
	}
	// instaTaps = 0;
	// var tmrTaps = setInterval(function(){
	// 	instaTaps = document.getElementsByClassName("instarun");
	// 	if( instaTaps.length > 0 ) {
	// 		for (var i = 0; i < instaTaps.length; i++) {
	// 			instaTaps[i].addEventListener('touchstart',tapHandler);
	// 		}
	// 		log( instaTaps );
	// 		clearInterval(tmrTaps);
	// 		tmrTaps = null;
	// 	}
	//  }, 1000);
}

function initTaps2() {
	instaTaps = 0;
	var tmrTaps = setInterval(function(){
		instaTaps = document.getElementsByClassName("instarun");
		if( instaTaps.length > 0 ) {
			for (var i = 0; i < instaTaps.length; i++) {
				instaTaps[i].addEventListener('touchstart',tapHandler);
			}
			clearInterval(tmrTaps);
			tmrTaps = null;
		}
	 }, 1000);
}

function tapHandler(event) {
	var id = this.id;
	var postGroups = "#" + $(this).data('groups');
	if(!tapedTwice) {
		tapedTwice = true;
		setTimeout( function() { tapedTwice = false; }, 300 );
		return false;
	}
	event.preventDefault();
	var elemId = postGroups + " #insta-" + this.id;
	$(elemId).fadeIn();
	var param = {
		'likes':'add',
		'id':this.id
	};
	var likeElem = $( postGroups + ' span.count-like-' + id);
	if( likeElem.length > 1 ) {
		likeElem = $(likeElem[0]);
	}
	likeElem.text(parseInt(likeElem.text()) + 1);
	$.getJSON( apiUrl + parse(param), function( data ) {
		if( data == false ) {
			alertError('Unable to like this ad.');
			return false;
		}
	});
	tickHeart( '.favorites_' + this.id );
	setTimeout(function(){ $(elemId).fadeOut(); }, 2000);
 }

$(document).on("dblclick", ".instarun", function(e) {
	var id = this.id;
	var postGroups = "#" + $(this).data('groups');
	var elemId = postGroups +" #insta-" + this.id;
	$(elemId).css('top', '40%');
	$(elemId).fadeIn();
	var param = {
		'likes':'add',
		'id':this.id
	};
	var likeElem = $( postGroups + ' span.count-like-' + id);
	if( likeElem.length > 1 ) {
		likeElem = $(likeElem[0]);
	}
	likeElem.text(parseInt(likeElem.text()) + 1);
	$.getJSON( apiUrl + parse(param), function( data ) {
		if( data == false ) {
			alertError('Unable to like this ad.');
			return false;
		}
	}); 
	tickHeart( '#post-results-list .favorites_' + this.id );
	setTimeout(function(){ $(elemId).fadeOut(); }, 2000);
});


/**
 *	Force Different Style on Pages
 */
if(  isPage('auto') ) {
	$( '.everyC' ).each(function (e) {
	    this.style.setProperty( 'margin', '0px 0px 0px 13%', 'important' );
	});	
}

$(document).on('click', '.purpose', function(e){
	if( this.id == "New" ) {
		$("#Used").removeClass("active");
		$('#New').addClass('active');
	}else{
		$('#New').removeClass("active");
		$('#Used').addClass('active');
	}
});

$(document).ready(function() {
	initTaps2();
});


$( ".sidenewbtn .nav-link" ).click(function() {
	$( ".sidenewbtn" ).removeClass('active');
	$(this).parent().addClass('active');
});