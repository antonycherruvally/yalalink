// JavaScript Document
var baseurl = window.location.host;
var roxyFileman = 'assets/fileman/index.html';
$(function() {
    CKEDITOR.replace('description', {
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        filebrowserBrowseUrl: 'assets/fileman/index.html?integration=ckeditor',
        filebrowserImageBrowseUrl: 'assets/fileman/index.html?integration=ckeditor&type=image',
        removeDialogTabs: 'link:upload;image:upload'
    });
});
getCity($("#country").val());

function getCity(country) {
    $('.area').hide();
    $.ajax({
        'url': baseurl+'get_location/' + country,
        'async': false,
        'type': "get",
        'dataType': "html",
        'success': function(data) {
            if (data != 'empty') {
                $('#location').html(data);
            } else {
                $('#location').html(data);
            }
        }
    });
}
getArea($("#location").val());

function getArea(city) {
    $('.area').show();
    $.ajax({
        'url': baseurl+'get_area/' + city,
        'async': false,
        'type': "get",
        'dataType': "html",
        'success': function(data) {
            if (data != 'empty') {
                $('.area').fadeIn('slow');
                $('#area').html(data);
            } else {
                $('.area').hide();
                $('#area').html(data);
            }
        }
    });
}
$(document).ready(function(e) {
    $('#country').change(function(e) {
        $('.area').hide();
        getCity(this.value);
    });
    $('#location').change(function(e) {
        getArea(this.value);
    });
});