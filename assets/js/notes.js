
const sortType = {
	NAME: "NAME",
	DATE: "DATE",
	TYPE: "TYPE"
};

let sortby = sortType.NAME;

$(document).ready(function () {
	displayNotes();

	$('#btnSelectAll').click(function () {

	});

	$('#btnSaveNote').click(function () {
		var title = $('#inputNoteTitle').val();
		var content = $('#inputNoteContent').val();
		var timestamp = moment().format('lll');
		if(title === '') {
			title = 'untitled';
		}

		if(content === '') {
			return;
		}

		$.ajax({
			url: baseUrl('notes/saveNote'),
			data: {
				title: title,
				content: content
			},
			type: 'POST',
			success: function(result) {
				console.log(result);
				displayNotes();
				$('#divCreateNote').modal('hide');
			},
			error: function(err) {
				console.log(err);
				$('#divCreateNote').modal('hide');
			}
		});
		
	});

	$('#btnCancel').click(function () {
		$('#inputNoteTitle').val('');
		$('#inputNoteContent').val('');
	});

	$('.orderby').click(function () {
		sortby = $(this).data('valuetype');
		displayNotes();
	});
});

var displayNotes = function () {
	$.ajax({
		url: baseUrl('notes/getNotes'),
		type: 'POST',
		data: {
			sortby: sortby
		},
		success: function (result) {
			result = JSON.parse(result);
			console.log(result);
			$('#divNoteList').html('');
			for (let ctr = 0; ctr < result.rows.length; ctr++) {
				noteFormat(result.rows[ctr]);
			}
		},
		error: function (err) {
			console.log(result);
		}
	});
}

var noteFormat = function (rows) {
	var html = '<div class="card darktheme-blue rounded text-teal m-3" style="min-width: 400px">';
	html += '<div class="card-header bg-teal text-light">';
	html += '<label>' + rows.title + '</label>';
	html += '<label class="float-right">' + rows.create_ts + '</label>';
	html += '</div>';
	html += '<div class="card-body">';
	html += '<div style="min-height: 50px">' + rows.content + '</div>';
	html += '</div>';
	html += '<div class="card-footer">';
	html += '<div class="btn-teal float-right">' + rows.status + '</div>';
	html += '</div>';
	html += '</div>';
	html += '<br/>';
	$(html).appendTo('#divNoteList');
}