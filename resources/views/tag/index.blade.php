<x-app-layout>
	<div class="fade-in">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<div><i class="fa fa-align-justify"></i> Tag List</div>
						<div>
							<a href="{{route('tag.create')}}" class="btn btn-outline-primary btn-sm">Add
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-responsive-sm table-bordered table-striped table-sm">
							<thead>
							<tr>
								<th>Tag name</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							@forelse($tags as $tag)
								<tr>
									<td>{{$tag->tag_name}}</td>
									<td>
										<form action="{{route('tag.destroy',$tag->id)}}" method="post">
											@csrf
											@method('DELETE')
											<a href="{{route('tag.edit',$tag->id)}}" class="text-warning btn
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
									<td colspan="2" class="text-center">
										No Data Found
									</td>
								</tr>
							@endforelse
							</tbody>
						</table>
						{{$tags->links()}}
					</div>
				</div>
			</div>

		</div>
	</div>
</x-app-layout>