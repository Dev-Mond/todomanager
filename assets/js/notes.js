
const sortType = {
	NAME: "NAME",
	DATE: "DATE",
	TYPE: "TYPE"
};

let sortby = sortType.NAME;

$(document).ready(function () {

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

		
	});

	$('#btnCancel').click(function () {

	});

	$('.orderby').click(function () {
		sortby = $(this).data('valuetype');
		
	});
});

var getNotesOrderBy = function (sorting) {

}