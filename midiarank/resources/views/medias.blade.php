@include('header')

<div class="mt-5 container">
	<div class="row d-block text-white rounded border border-dark" id="post-data">
		
		<!-- Begin of search input -->
		<div class='col-12'>
			<div class="mt-5 form-group row">
				<div class="col-12">
					<input type="text" class="form-control form-control-lg" id="mediaTags" placeholder="Pesquisar">
				</div>
			</div>

			<div id="list">
				@include('data')
			</div>
		</div>
		<!-- End of search input -->
		
	</div>
</div>

<div class="ajax-load text-center" style="color:white;display:none">
	<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More</p>
</div>

<!-- If take off script bellow menu toast doesn work -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/rank.js')}}"></script>
