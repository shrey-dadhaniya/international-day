<x-app-layout>
	<div class="fade-in">
		<div class="row">
			<div class="col-sm-6 mx-auto">
				<form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="card">
						<div class="card-header"><strong>Edit Category</strong></div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Name</label>
										<input class="form-control" id="name" name="category_name" type="text"
										       placeholder="Enter Category name"
										value="{{old('category_name')??$category->category_name}}">
										@error('category_name')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Banner</label>
										<input class="form-control" id="banner" name="banner-file" type="file">
										@error('banner-file')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
							</div>

						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" type="submit">Update</button>
							<a href="{{route('category.index')}}" class="btn btn-sm btn-danger">cancel</a>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</x-app-layout>