$('#frmAddCorpAccount').validate({
	rules: {
		first_name: {
			required: true,
			minlength: 3
		},
		last_name: {
			required: true,
			minlength: 3
		},
		email: {
			required: true,
			email: true,
			remote: site.baseUrl + 'board/emailCheck'
		},
		password: {
			required: true,
			minlength: 8
		},
		address: {
			required: true,
			minlength: 5
		},
		postcode: {
			required: true
		},
		mobile: {
			required: true,
			digits: true
		},
		vcode: {
			required: true
		},
	}
});