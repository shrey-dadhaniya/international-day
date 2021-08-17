<x-app-layout>
	<x-slot name="style">
		<style>
            .C_P {
                cursor: pointer;
            }
		</style>
	</x-slot>
	<div class="fade-in">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<div><i class="fa fa-align-justify"></i> Poster List</div>
						<div>
							<a href="{{route('poster.create')}}" class="btn btn-outline-primary btn-sm">Add
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="accordion" id="accordion" role="tablist">
							@forelse($days as $key => $day)
								<div class="card mb-0">
									<div class="card-header C_P" id="{{'heading_'.$key}}" role="tab"
									     data-toggle="collapse"
									     href="#{{'collapse_'.$key}}"
									     aria-expanded="false"
									     aria-controls="{{'collapse_'.$key}}" class="collapsed">
										<h5 class="mb-0">{{$day->day_name}}</h5>
									</div>
									<div class="collapse" id="{{'collapse_'.$key}}" role="tabpanel"
									     aria-labelledby="{{'heading_'.$key}}"
									     data-parent="#accordion" style="">
										<div class="card-body">
											<div class="row">
												@forelse($day->posters as $k=>$media)
													<form class="col-md-2" method="post"
													      action="{{route('poster.destroy',$day->id)}}">
														@csrf
														@method('DELETE')
														<input type="hidden" name="media" value="{{$media->id}}">
														<button class="btn btn-block btn-danger" type="submit">Delete</button>
														<img src="{{$media->getUrl()}}" alt="" class="img-fluid">
													</form>
												@empty
												@endforelse
											</div>
										</div>
									</div>
								</div>
							@empty
							@endforelse
						</div>
						<div class="mt-3">
							{{$days->links()}}
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</x-app-layout>