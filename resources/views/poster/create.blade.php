<x-app-layout>
	<x-slot name="style">
		<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
	</x-slot>
	<x-slot name="script">
		<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
		<script>
            var uploadedDocumentMap = {}
            Dropzone.options.documentDropzone = {
                url: '{{ route('media') }}',
                method: 'post',
                maxFilesize: 2, // MB
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()
                },
                init: function () {
					@if(isset($project) && $project->document)
                    var files =
					{!! json_encode($project->document) !!}
                        for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
					@endif
                }
            }
		</script>

	</x-slot>
	<div class="fade-in">
		<form action="{{route('poster.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header"><strong>Documents</strong></div>
						<div class="card-body">
								<div class="needsclick dropzone" id="document-dropzone">
								</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header"><strong>Create Poster</strong></div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Day</label>
										<select class="select2 form-control" name="day_id">
											@forelse($days as $key=>$value)
												<option value="{{$key}}">{{$value}}</option>
											@empty
											@endforelse
										</select>
										@error('day_id')
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

				</div>

			</div>
		</form>
	</div>
</x-app-layout>