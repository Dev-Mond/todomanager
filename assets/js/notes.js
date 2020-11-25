
const sortType = {
	NAME: "NAME",
	DATE: "DATE",
	TYPE: "TYPE"
};

let sortby = sortType.NAME;

$(document).ready(function () {

	$('#btnSelectAll').click(function () {

	});

	$('#btnCreateNew').click(function () {

	});

	$('.orderby').click(function () {
		sortby = $(this).data('valuetype');
		
	});
});

var getNotesOrderBy = function (sorting) {

}