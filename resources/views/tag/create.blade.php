<x-app-layout>
	<div class="fade-in">
		<div class="row">
			<div class="col-sm-6 mx-auto">
				<form action="{{route('tag.store')}}" method="post">
					@csrf
					<div class="card">
						<div class="card-header"><strong>Create Tag</strong></div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Name</label>
										<input class="form-control" id="name" name="tag_name" type="text"
										       placeholder="Enter Tag name">
										@error('tag_name')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
							</div>

						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" type="submit"> Submit</button>
							<button class="btn btn-sm btn-danger" type="reset"> Reset</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</x-app-layout>