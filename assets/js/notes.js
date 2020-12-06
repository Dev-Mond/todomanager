
let sortBy = 'NAME';
let sortType = 'ASC';
let inputNoteContent;

$(document).ready(function () {
	displayNotes();
	inputNoteContent = $('#inputNoteContent').trumbowyg();

	$('#divNoteList').click(function () {

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
				$('#inputNoteTitle').val('');
				inputNoteContent.trumbowyg('html', '');
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

	$('#btnDeleteNote').click(function () {
		if($('#inputDelete').val().match(/delete permanently/g)) {
			$('#inputDelete').val('');
			deleteNotes();
		}
		else {
			$(errorMessage('Your input is not matched!')).appendTo('#divDropNote .modal-body');
		}
	});

	$('.orderby').click(function () {
		sortBy = $(this).data('value');
		displayNotes();
	});

	$('.ordertype').click(function () {
		sortType = $(this).data('value');
		displayNotes();
	});
});

var displayNotes = function () {
	$.ajax({
		url: baseUrl('notes/getNotes'),
		type: 'POST',
		data: {
			sort_by: sortBy,
			sort_type: sortType
		},
		success: function (result) {
			result = JSON.parse(result);
			console.log(result);
			noteFormat($('#divNoteList'), result.rows);
		},
		error: function (err) {
			console.log(result);
		}
	});
}

var noteFormat = function (obj, rows = [], config = { columnCount: 2 }) {
	$(obj).html('');
	if(rows.length <= 0) {
		console.warn('Emty set.');
		return;
	}
	this.container = $('<div></div>');
	this.row = undefined;
	this.division = 12 / config.columnCount;
	console.log(division);

	function addColumn(html) {
		return $('<div class="col-sm-' + this.division + '"></div>').append(html);
	}

	function addNewRow(columnArray) {
		return $('<div class="row justify-content-center overflow-auto"></div>').append(columnArray);
	}

	function createContent(data) {
		var html = '<div class="card darktheme-blue rounded text-teal" data-id="' +data.id+ '">';
		html += '<div class="card-header bg-teal text-light">';
		html += '<label>' + data.title + '</label>';
		html += '<label class="float-right">' + data.create_ts + '</label>';
		html += '</div>';
		html += '<div class="card-body">';
		html += '<div style="min-height: 50px">' + data.content + '</div>';
		html += '</div>';
		html += '<div class="card-footer">';
		html += '<div class="text-teal float-right">&mdash; ' + capitalize(data.status) + '</div>';
		html += '</div>';
		html += '</div>';
		html += '<br/>';
		return html;
	}

	for (let ctr = 0; ctr < rows.length; ) {
		var columnArray = [];
		for (var column = 0; column < config.columnCount; column++) {
			if(ctr < rows.length) {
				columnArray.push(addColumn(createContent(rows[ctr++])));
			}
			else{
				columnArray.push(addColumn(''));
			}
		}
		$(container).append(addNewRow(columnArray));
	}

	$(container).appendTo(obj);
}

var deleteNotes = function(id = false) {
	var params = {};
	if (!id) {
		params = {
			url: baseUrl('notes/remove'),
			type: 'GET',
			data: null,
		}
	}
	else {
		params = {
			url: baseUrl('notes/remove') + '/id',
			type: 'GET',
			data: null,
		}
	}

	params['success'] = function (result) {
		console.log(result);
		displayNotes();
		$('#divDropNote').modal('hide');
	}

	params['error'] = function (err) {
		console.log(result);
		$('#divDropNote').modal('hide');
	}

	$.ajax(params);
}

var errorMessage = function (message) {
	var html = '<div class="input-group bg-danger border-danger rounded text-light">';
	html += '<div class="input-group-prepend">';
	html += '<label class="input-group-text bg-transparent text-light" style="border: none !important">'+ message +'</label>';
	html += '</div>';
	html += '<button type="button" class="btn btn-sm bg-transparent border-none ml-auto text-light font-weight-bold" onclick="$(this).parent().remove()"><span aria-hidden="true">&times;</span></button>';
	html += '</div>';
	return html;
}
