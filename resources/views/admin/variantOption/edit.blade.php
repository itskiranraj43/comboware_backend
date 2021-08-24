@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Edit Variant Option
    </div>

    <div class="card-body">
        <form action="{{ route('admin.variantOption.update', [$VariantOptions->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$VariantOptions->name  }}" required>
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
            <label for="variant_id">Variants Names *</label>
                <select name="variant_id" id="variant_id" class="form-control select2" required>
                    @foreach($variants_names as $id => $variants_name)
            <option  value="{{ $variants_name->id }}" <?php if($variants_name->id== $VariantOptions->variant_id) echo 'selected="selected"'; ?> > {{$variants_name->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('variants_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('variants_name') }}
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