<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInteractionRequest;
use App\Http\Requests\StoreInteractionRequest;
use App\Http\Requests\UpdateInteractionRequest;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Interaction;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InteractionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('interaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interactions = Interaction::with(['company', 'contact', 'team', 'media'])->get();

        return view('admin.interactions.index', compact('interactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('interaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = Contact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.interactions.create', compact('companies', 'contacts'));
    }

    public function store(StoreInteractionRequest $request)
    {
        $interaction = Interaction::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $interaction->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $interaction->id]);
        }

        return redirect()->route('admin.interactions.index');
    }

    public function edit(Interaction $interaction)
    {
        abort_if(Gate::denies('interaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = Contact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $interaction->load('company', 'contact', 'team');

        return view('admin.interactions.edit', compact('companies', 'contacts', 'interaction'));
    }

    public function update(UpdateInteractionRequest $request, Interaction $interaction)
    {
        $interaction->update($request->all());

        if (count($interaction->files) > 0) {
            foreach ($interaction->files as $media) {
                if (! in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $interaction->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $interaction->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.interactions.index');
    }

    public function show(Interaction $interaction)
    {
        abort_if(Gate::denies('interaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interaction->load('company', 'contact', 'team');

        return view('admin.interactions.show', compact('interaction'));
    }

    public function destroy(Interaction $interaction)
    {
        abort_if(Gate::denies('interaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyInteractionRequest $request)
    {
        $interactions = Interaction::find(request('ids'));

        foreach ($interactions as $interaction) {
            $interaction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('interaction_create') && Gate::denies('interaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Interaction();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
