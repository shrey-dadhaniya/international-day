<x-app-layout>
	<x-slot name="style">
{{--		<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">--}}
	</x-slot>
	<x-slot name="script">
{{--		<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>--}}
{{--		<script>--}}
{{--            var uploadedDocumentMap = {}--}}
{{--            Dropzone.options.documentDropzone = {--}}
{{--                url: '{{ route('media') }}',--}}
{{--	            method:'post',--}}
{{--                maxFiles:1,--}}
{{--                maxFilesize: 2, // MB--}}
{{--                addRemoveLinks: true,--}}

{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                },--}}
{{--                success: function (file, response) {--}}
{{--                    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')--}}
{{--                    uploadedDocumentMap[file.name] = response.name--}}
{{--                },--}}
{{--                removedfile: function (file) {--}}
{{--                    file.previewElement.remove()--}}
{{--                    var name = ''--}}
{{--                    if (typeof file.file_name !== 'undefined') {--}}
{{--                        name = file.file_name--}}
{{--                    } else {--}}
{{--                        name = uploadedDocumentMap[file.name]--}}
{{--                    }--}}
{{--                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()--}}
{{--                },--}}
{{--                init: function () {--}}
{{--					@if(isset($project) && $project->document)--}}
{{--                    var files =--}}
{{--					{!! json_encode($project->document) !!}--}}
{{--                        for (var i in files) {--}}
{{--                        var file = files[i]--}}
{{--                        this.options.addedfile.call(this, file)--}}
{{--                        file.previewElement.classList.add('dz-complete')--}}
{{--                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')--}}
{{--                    }--}}
{{--					@endif--}}
{{--                }--}}
{{--            }--}}
{{--		</script>--}}

	</x-slot>
	<div class="fade-in">
		<div class="row">
			<div class="col-sm-10 mx-auto">
				<form action="{{route('day.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header"><strong>Create Day</strong></div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input class="form-control" id="name" name="day_name" type="text"
										       placeholder="Enter Day name" value="{{old('day_name')}}">
										@error('day_name')
										<span class="help-block text-danger">{{$message}}</span>
										@enderror
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Date</label>
										<input class="form-control" id="name" name="day_date" type="date"
										      value="{{old('day_date')}}">
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
											<option value="{{$key}}">{{$tag}}</option>
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
											<option value="{{$key}}">{{$tag}}</option>
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
											<option value="{{$key}}">{{$tag}}</option>
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
										<textarea name="day_description" class="form-control"></textarea>
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