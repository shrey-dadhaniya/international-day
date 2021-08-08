<x-app-layout>
	<div class="fade-in">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<div><i class="fa fa-align-justify"></i> Day List</div>
						<div>
							<a href="{{route('day.create')}}" class="btn btn-outline-primary btn-sm">Add
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-responsive-sm table-bordered table-striped table-sm">
							<thead>
							<tr>
								<th>Day name</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							@forelse($days as $day)
								<tr>
									<td>{{$day->day_name}}</td>
									<td>
										<form action="{{route('day.destroy',$day->id)}}" method="post">
											@csrf
											@method('DELETE')
											<a href="{{route('day.edit',$day->id)}}" class="text-warning btn
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
						{{$days->links()}}
					</div>
				</div>
			</div>

		</div>
	</div>
</x-app-layout>