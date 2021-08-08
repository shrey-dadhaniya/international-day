<x-app-layout>
	<div class="fade-in">
		<div class="row">
			<div class="col-sm-10 mx-auto">
				<form action="{{route('day.update',$day->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="card">
						<div class="card-header"><strong>Edit Day</strong></div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input class="form-control" id="name" name="day_name" type="text"
										       placeholder="Enter Day name" value="{{old('day_name')??$day->day_name}}">
										@error('day_name')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Date</label>
										<input class="form-control" id="name" name="day_date" type="date"
										       value="{{old('day_date')??$day->day_date}}">
										@error('day_date')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Category</label>
										<select class="select2 form-control" name="category_id">
											@forelse($category_dropdown_array as $key=>$tag)
												<option value="{{$key}}"
												@if($day->category_id==$key)
													selected
												@endif
												>{{$tag}}</option>
											@empty
											@endforelse
										</select>
										@error('category_id')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Country</label>
										<select class="select2 form-control" name="country_id">
											@forelse($country_dropdown_array as $key=>$tag)
												<option value="{{$key}}"
												        @if($day->country_id==$key)
												        selected
														@endif
												>{{$tag}}</option>
											@empty
											@endforelse
										</select>
										@error('country_id')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Tags</label>
										<select class="select2 form-control" name="tags[]"
										        multiple="multiple">
											@forelse($tag_dropdown_array as $key=>$tag)
												<option value="{{$key}}"
												        @if(in_array($key,$day->tagsToArray()))
												        selected
														@endif
												>{{$tag}}</option>
											@empty
											@endforelse
										</select>
										@error('tags')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Banner</label>
										<input type="file" name="banner-file" class="form-control">
										@error('banner-file')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Description</label>
										<textarea name="day_description" class="form-control">{{old
										('day_description')??$day->day_description}}</textarea>
										@error('day_description')
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