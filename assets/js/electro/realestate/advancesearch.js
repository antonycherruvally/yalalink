console.log('%c Stop!', 'font-weight: 900; font-size: 80px;color: red; text-shadow: 2px 0px 0px rgb(0,0,0)');
/**
 *	Advance Seach
 *	@author Ramon Alexis Celis
 *	@since 09.04.18
 */

var searhparams = false;
var numResult = 0;

// Google maps
function initialize() {
  var input = document.getElementById('location');
  new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);

// check if value is null
function isEmpty( str ) {
	if( str === null ){
		return true;
	}
	return false;
}

function clearSearchFields() {
	var purpose 	= $("#purpose").val("");
	var propType 	= $("#property_type").val("");
	var pricePerDate = $("#price_per").val("");
	var bed 		= $("#bedroom").val("");
	var maxPrice 	= $("#max_price").val("");
	var minPrice 	= $("#min_price").val("");
	var maxArea 	= $("#max_area").val("");
	var minArea 	= $("#min_area").val("");
	var location 	= $("#location").val("");
	var keyword 	= $("#keyword").val("");
	$("#btnAdvanceSearch").text('Find');
}

// prepare and parse the parameters
function paramParser( cmd = false ) {
	var purpose 	= $("#purpose").val();
	var propType 	= $("#property_type").val();
	var pricePerDate = $("#price_per").val();
	var bed 		= $("#bedroom").val();
	var maxPrice 	= $("#max_price").val();
	var minPrice 	= $("#min_price").val();
	var maxArea 	= $("#max_area").val();
	var minArea 	= $("#min_area").val();
	var location 	= $("#location").val();
	var keyword 	= $("#keyword").val();
	var city 		= $("#city").val();
	var area 		= $("#area").val();

	searhparams = {
		'realestatesearch': cmd,
		'purpose'		:purpose, 
		'propType'		:propType, 
		'pricePerDate'	:pricePerDate, 
		'bed'			:bed, 
		'maxPrice'		:maxPrice, 
		'minPrice'		:minPrice,
		'maxArea'		:maxArea,
		'minArea'		:minArea,
		'location'		:location,
		'city'			:city,
		'area'			:area,
		'keyword'		:keyword
	 };
	 return parse(searhparams);
}

// search
$( "#btnAdvanceSearch" ).click(function() {
	listingsuri = paramParser();
	 $.getJSON( apiUrl + paramParser(), function( data ) {
		if( data == false ){
			alertError('No result found.');
			return;
		}
		makePagination(data.length);
		getListings(data);
	});

	// alertError('Something went wrong, please try again.');
	return;
});

// display how many results
function resCounter() {
	$.getJSON( apiUrl + paramParser('rescount'), function( data ) {
		if( data == false ){
			$(".btnAdvanceSearch").text('Find (0)');
		}else{
			$(".btnAdvanceSearch").text('Find (' + data + ')');
		}
	});
}

$( "#purpose, #property_type, #price_per, #bedroom, #city, #area" ).change(function() {
	resCounter();
});

$('#location, #max_price, #min_price, #max_area, #min_area, #keyword').bind('input', function(){
  resCounter();
});




/**
 * Auto Search
 */
 var autoParams;

$( "button#btnSearchAuto" ).click(function() {
	autoParams = {
		'autosearch'	: 'search',
		'purpose'		: $("#auto_purpose").val(),
		'propType'		: $("#auto_property_type").val(),
		'purpose'		: $("#auto_purpose").val(),
		'brand'			: $("#auto_brand").val(),
		'model'			: $("#auto_model").val(),
		'year'			: $("#auto_year").val(),
		'kilometer'		: $("#auto_kilometer").val(),
		'maxPrice'		: $("#auto_max_price").val(),
		'minPrice'		: $("#auto_min_price").val(),
		'location'		: $("#auto_location").val(),
		'keyword'		: $("#auto_keyword").val()
	};
	$.getJSON( apiUrl + parse(autoParams), function( data ) {
		console.table(data);
	});
});

