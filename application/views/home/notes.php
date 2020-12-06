
<script type="text/javascript" src="<?=base_url('assets/js/notes.js')?>"></script>
<section class="content overflow-auto" style="top:-20%; min-height: 85.8vh; max-height: 85.8vh">
	<div class="row text-light">
		<div class="col-lg-9">
			<div class="w-100 d-inline">
				<div class="input-group float-left w-50">
					<div class="input-group-prepend">
						<button id="btnSelectAll" class="btn border-teal text-teal-alive btn-sm selectable" type="button"><i class="fa fa-list-ol"></i> ALL</button>
						<button class="btn border-teal text-teal-alive btn-sm selectable" data-toggle="modal" data-target="#divCreateNote" type="button"><i class="fa fa-plus"></i> CREATE</button>
					</div>
					<button class="btn border-teal text-teal-alive btn-sm selectable" data-toggle="modal" data-target="#divDropNote" type="button"><i class="far fa-trash-alt"></i> DELETE</button>
				</div>
				<div class="float-right w-50 d-flex">
					<div class="input-group">
						<button class="btn border-teal text-teal-alive btn-sm" disabled>SORT BY:</button>
						<div class="input-group-append">
							<button class="btn border-teal text-teal-alive btn-sm orderby selectable-group-notesortby selected" type="button" data-value="NAME">NAME</button>
							<button class="btn border-teal text-teal-alive btn-sm orderby selectable-group-notesortby" type="button" data-value="DATE">DATE</button>
							<button class="btn border-teal text-teal-alive btn-sm orderby selectable-group-notesortby" type="button" data-value="TYPE">TYPE</button>
						</div>
					</div>
					<div class="input-group">
						<button class="btn border-teal text-teal-alive btn-sm" disabled>SORT TYPE:</button>
						<div class="input-group-append">
							<button class="btn border-teal text-teal-alive btn-sm ordertype selectable-group-notesorttype selected" type="button" data-value="ASC">ASC</button>
							<button class="btn border-teal text-teal-alive btn-sm ordertype selectable-group-notesorttype" type="button" data-value="DESC">DESC</button>
						</div>
					</div>
				</div>
				
			</div>
			<!-- LIST OF NOTES -->
			<div class="container-fluid pt-5">
				<div id="divNoteList"></div>
			</div>	
		</div>
		<!-- SIDE DISPLAY -->
		<div class="col-lg-3">

		</div>
	</div>
</section>

<!-- MODAL -->
<!-- CREATE NOTES -->
<div class="modal fade" tabindex="-1" id="divCreateNote" aria-labelledby="divModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-teal text-light">
				<div class="modal-title" id="divModalTitle">CREATE NOTE</div>
				<button class="outline-none rounded-circle bg-light btn-teal text-teal" style="outline: none !important" type="button" data-dismiss="modal" aria-label="close">
					<span class="" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="input-group border-teal">
					<div class="input-group-prepend">
						<span class="input-group-text">Title : </span>
					</div>
					<input id="inputNoteTitle" type="text" class="form-control" placeholder="untitled"></input>
				</div>
				<div class="mt-2">Content : </div>
				<textarea id="inputNoteContent" class="form-control border-teal" rows="10" placeholder="Write your note"></textarea>
			</div>
			<div class="modal-footer bg-teal text-light">
				<div class="input-group w-auto">
					<div class="input-group-prepend">
						<button id="btnSaveNote" class="btn btn-sm btn-teal border-teal bg-light text-teal" type="button">SAVE</button>
					</div>
					<button id="btnCancel" class="btn btn-sm btn-teal border-teal bg-light text-teal" type="button" data-dismiss="modal">CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- DROP ALL NOTES -->
<div class="modal fade" tabindex="-1" id="divDropNote" aria-labelledby="divDropModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-teal text-light">
				<div class="modal-title" id="divDropModalTitle">Delete all notes</div>
				<button class="outline-none rounded-circle bg-light btn-teal text-teal" style="outline: none !important" type="button" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="delete">Type "delete permanently" to delete.</label>
					<input type="text" id="inputDelete" name="delete" class="form-control plaintext" autocomplete="off"></input>
				</div>
			</div>
			<div class="modal-footer bg-teal text-light">
				<div class="input-group w-auto">
					<div class="input-group-prepend">
						<button id="btnDeleteNote" class="btn btn-sm btn-teal border-teal bg-light text-teal" type="button">DELETE</button>
					</div>
					<button class="btn btn-sm btn-teal border-teal bg-light text-teal" type="button" data-dismiss="modal">CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</div>