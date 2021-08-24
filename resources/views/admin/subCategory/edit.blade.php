@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Edit Sub Category
    </div>

    <div class="card-body">
        <form action="{{ route('admin.subCategory.update', [$SubCategory->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$SubCategory->name  }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.role.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
            <label for="category_id">categories *</label>
                <select name="category_id" id="category_id" class="form-control select2" required>
                    @foreach($categories as $id => $category)
            <option  value="{{ $category->id }}" <?php if($category->id== $SubCategory->category_id) echo 'selected="selected"'; ?> > {{$category->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.role.fields.permissions_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection