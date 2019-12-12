//Back to previous page
$('#backBtn').on('click', function(e) {
	e.preventDefault()
	window.history.back()
})


//Adding 'Add new' button
$(document).ready(function() {
	const addBtn = '<div class="col-12 col-md-4 d-flex justify-content-end align-items-center"><a class="btn btn-primary" href="/recipient/add/">Add New Recipient</a></div>'

	$('#recTable_wrapper .row:first-child .col-md-6').removeClass('col-md-6').addClass('col-md-4')
	$col = $('#recTable_wrapper .row:first-child').append(addBtn)
}) 


//Saving recipient information changes
$('#saveRecBtn, #updateRecBtn, #delRecBtn').on('click', function(e) {
	
	e.preventDefault()

	const id = this.id
	
	let recData = {}
	
	$('#recipientForm input:not([type=checkbox]),  #recipientForm select').each(function() {
		let name = $(this).attr('name')
		recData[name] = $(this).val()
	})

	$('#recipientForm [type=checkbox]').each(function() {
		let name = $(this).attr('name')
		recData[name] = ($(this).prop('checked')) ? 1 : 0;
	})

	ajax(id, recData)

})

const ajax = (id, recData) => {

	switch (id) {

		case '#saveRecBtn'
		const url = '/api/recipient/insert/'
		break

		case '#updateRecBtn'
		const url = '/api/recipient/'+recData.id+'/update/'
		break

		case '#delRecBtn'
		const url = '/api/recipient/'+recData.id+'/delete/'
		break

	}

	let response = fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify(recData)
	})
	.then(function(response) {
		response.json().then(function(data) {
			$('#message').addClass(data.status === 'ok' ? 'ok' : 'error').text(data.text).show()
			if (!recData.id) {
				$('#recipientForm input[type=text], #recipientForm input[type=email]').each(function () {
					$(this).val('');
				});
			}
		})
	})

}

