/*
 * Obtain user location and validate phone number
 * User location tracking source: International Telephone Input v10.0.6
 */

 $("#mobile").intlTelInput({
  hiddenInput: "full_phone",
  initialCountry: "auto",
  preferredCountries:["ae"],
  separateDialCode: true,
  geoIpLookup: function(callback) {
    $.get('//ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  },
  utilsScript: "assets/front_end/js/utils.js" // just for formatting/placeholders etc
});
/*
 * Let us validate the phone number
*/
var telInput = $("#mobile"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");
  
var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
	  var getCode = telInput.intlTelInput('getSelectedCountryData').dialCode;
	  $("#country_code").val(getCode);	
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);
