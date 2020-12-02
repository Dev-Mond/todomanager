
<script type="text/javascript" src="<?=base_url('assets/js/notes.js')?>"></script>
<section class="content overflow-auto" style="top:-20%; min-height: 85.8vh; max-height: 85.8vh">
	<div class="row text-light">
		<div class="col-lg-9">
			<div class="w-100 d-inline">
				<div class="input-group float-left w-50">
					<div class="input-group-prepend">
						<button id="btnSelectAll" class="btn border-teal text-teal-alive btn-sm selectable" type="button">ALL</button>
					</div>
					<button class="btn border-teal text-teal-alive btn-sm selectable" data-toggle="modal" data-target="#divCreateNote" type="button">CREATE</button>
				</div>
				<div class="input-group float-right w-50">
					<button class="btn border-teal text-teal-alive btn-sm ml-auto" disabled>SORT BY:</button>
					<div class="input-group-append">
						<button class="btn border-teal text-teal-alive btn-sm orderby selectable-group selected" type="button" data-valuetype="NAME">NAME</button>
						<button class="btn border-teal text-teal-alive btn-sm orderby selectable-group" type="button" data-valuetype="DATE">DATE</button>
						<button class="btn border-teal text-teal-alive btn-sm orderby selectable-group" type="button" data-valuetype="TYPE">TYPE</button>
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
					<button id="btnCancel" class="btn btn-sm btn-teal border-teal bg-light text-teal" type="button">CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</div>
	