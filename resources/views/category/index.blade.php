<x-app-layout>
	<div class="fade-in">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<div><i class="fa fa-align-justify"></i> Category List</div>
						<div>
							<a href="{{route('category.create')}}" class="btn btn-outline-primary btn-sm">Add
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-responsive-sm table-bordered table-striped table-sm">
							<thead>
							<tr>
								<th>Category name</th>
								<th>Banner</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							@forelse($categories as $category)
							<tr>
								<td>{{$category->category_name}}</td>
								<td><img src="{{$category->banner_url}}" class="img-fluid" style="width: 50px;" /></td>
								<td>
									<form action="{{route('category.destroy',$category->id)}}" method="post">
										@csrf
										@method('DELETE')
										<a href="{{route('category.edit',$category->id)}}" class="text-warning btn
										btn-sm">
											<i class="fa fa-edit"></i>
										</a>
									<button class="text-danger btn btn-sm" type="submit">
										<i class="fa fa-trash-alt"></i>
									</button>

									</form>
								</td>
							</tr>
							@empty
								<tr>
									<td colspan="20" class="text-center">
										No Data Found
									</td>
								</tr>
							@endforelse
							</tbody>
						</table>
							{{$categories->links()}}
					</div>
				</div>
			</div>

		</div>
	</div>
</x-app-layout>