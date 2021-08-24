@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.permission.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.permission.fields.id') }}
                        </th>
                        <td>
                            {{ $ProductData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Product Name
                        </th>
                        <td>
                            {{ $ProductData->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Category  Name
                        </th>
                        <td>
                            {{ $ProductData->Cname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sub Category Name
                        </th>
                        <td>
                            {{ $ProductData->ScName }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{ $ProductData->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Amount
                        </th>
                        <td>
                            {{ $ProductData->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Product Image
                        </th>
                        <td>
                        <img  src="{{asset('Product-Image').'/'.$ProductData->image }}" style= "width: 107px;">
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection