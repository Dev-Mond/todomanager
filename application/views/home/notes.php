
<script type="text/javascript" src="<?=base_url('assets/js/notes.js')?>"></script>
<section class="content overflow-auto" style="top:-20%; min-height: 85.8vh; max-height: 85.8vh">
	<div class="row text-light">
		<div class="col-lg-9">
			<div class="w-100 d-inline">
				<div class="input-group float-left w-50">
					<div class="input-group-prepend">
						<button id="btnSelectAll" class="btn border-teal text-teal-alive btn-sm selectable" type="button">ALL</button>
					</div>
					<button id="btnCreateNew" class="btn border-teal text-teal-alive btn-sm selectable" type="button">NEW</button>
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
	