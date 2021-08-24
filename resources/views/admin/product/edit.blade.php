@extends('layouts.admin')
@section('content')

<div class="card edit-product-section">
    <div class="card-header">
       Edit Product
    </div>

    <div class="card-body">
        <form action="{{ route('admin.product.update', [$ProductData->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
			<div class="row">
				<div class="col-md-6">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="name">Name*</label>
						<input type="text" id="name" name="name" class="form-control"  value="{{ $ProductData->name  }}" required>
					</div>
					<div class="form-group">
						<label for="category_id">Select Categories*</label>
						<select name="category_id" id="category_id" class="form-control select2" required>
							@foreach($categories as $id => $category)
								<option  value="{{ $category->id }}" <?php if($category->id== $ProductData->category_id) echo 'selected="selected"'; ?> > {{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="subCategory_id">Select SubCategories*</label>
						<select name="subCategory_id" id="subCategory_id" class="form-control select2" required>
							@foreach($subCategories as $id => $subCategory)
							<option  value="{{ $subCategory->id }}"  <?php if($subCategory->id== $ProductData->subCategory_id) echo 'selected="selected"'; ?>  > {{$subCategory->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="amount">Amount*</label>
						<input type="text" id="amount" name="amount" class="form-control" value="{{ $ProductData->amount  }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="description">Description*</label>
						<textarea name="description" id="description" class="form-control">{{ $ProductData->description  }}</textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
                <label for="image">Image*</label>
                <input type="file" id="image" name="image" class="form-control" >
            </div>
			<div class="form-group">
				<div class="image-block">
					<img  src="{{asset('Product-Image').'/'.$ProductData->image }}">
					<label for="image" >Other Image*</label>
				</div>
			</div>
			<div class="form-group">
                <label for="files">Select multiple files: </label>
                <input id="files" type="file" name="filenames[]" onchange="loadFile(event)" multiple/>   

				<div class="row">
					<div class="col-12">
						<div id="sortableImgThumbnailPreview">
						</div>
					</div>
				</div>
            </div>
			<script>
                var loadFile = function(event) {
                  var sortableImgThumbnailPreview = document.getElementById('sortableImgThumbnailPreview');
                  sortableImgThumbnailPreview.src = URL.createObjectURL(event.target.files[0]);
                  sortableImgThumbnailPreview.onload = function() {
                    URL.revokeObjectURL(sortableImgThumbnailPreview.src) // free memory
                  }
                };
              </script>
			
			<div class="form-group">
				<div id="ImgDel" class="multiple-image-block">
					<?php
					foreach($ProductImages as $ProductImage){
						?>
						<div class="image-group">
							<a id="ImgId" data-id="{{$ProductImage->id}}" value="{{$ProductImage->id}}" class="btn"><i class="fa fa-times"></i></a>
							<img  src="{{asset('Product-Image').'/'.$ProductImage->name  }}">
						</div>
						<?php 
					} ?>
				</div>
			</div>
			<p class="helper-block">
				{{ trans('cruds.permission.fields.title_helper') }}
			</p>
          
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection