// this is for custom sweetalert 

function alertError( msg, title = 'Oops...' ) {
	swal({
		type: 'error',
		title: title,
		text: msg,
	});
}

function alertSuccess( msg, title = 'Great...' ) {
	swal({
		type: 'success',
		title: title,
		text: msg,
	});
}