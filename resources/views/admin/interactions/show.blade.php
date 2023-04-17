@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.interaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.interactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.interaction.fields.id') }}
                        </th>
                        <td>
                            {{ $interaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interaction.fields.company') }}
                        </th>
                        <td>
                            {{ $interaction->company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interaction.fields.contact') }}
                        </th>
                        <td>
                            {{ $interaction->contact->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interaction.fields.files') }}
                        </th>
                        <td>
                            @foreach($interaction->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interaction.fields.notes') }}
                        </th>
                        <td>
                            {{ $interaction->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interaction.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Interaction::STATUS_SELECT[$interaction->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.interactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection