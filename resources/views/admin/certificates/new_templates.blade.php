@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.new_template') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.new_template') }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <p class="col">{{ trans('quiz.student') }} : [student] </p>

                        <p class="col">{{ trans('admin/main.course') }} : [course] </p>

                        <p class="col">{{ trans('quiz.grade') }} : [grade] </p>

                        <p class="col">{{ trans('admin/main.certificate_id') }} : [certificate_id] </p>
                    </div>

                    <hr class="my-4">

                    <form method="post" action="" id="templateForm" class="form-horizontal form-bordered">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label" for="inputDefault">{!! trans('public.title') !!}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ !empty($template) ? $template->title : old('title') }}">
                            <div class="invalid-feedback">@error('title') {{ $message }} @enderror</div>
                        </div>

                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.template_image') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="input-group-text admin-file-manager " data-input="image" data-preview="holder">
                                        <i class="fa fa-upload"></i>
                                    </button>
                                </div>
                                <input type="text" name="image" id="image" value="{{ !empty($template) ? $template->image : old('image') }}" class="form-control @error('image') is-invalid @enderror"/>
                                <div class="invalid-feedback">@error('image') {{ $message }} @enderror</div>
                            </div>
                            <div class="invalid-feedback">@error('image') {{ $message }} @enderror</div>
                        </div>

                        <div class="row">
                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault">{!! trans('admin/main.position_x') !!}</label>
                                    <input type="text" name="position_x" class="form-control @error('position_x') is-invalid @enderror" value="{{ !empty($template) ? $template->position_x : old('position_x') }}">
                                    <div class="invalid-feedback">@error('position_x') {{ $message }} @enderror</div>
                                </div>
                            </dov>
                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault">{!! trans('admin/main.position_y') !!}</label>
                                    <input type="text" name="position_y" class="form-control @error('position_y') is-invalid @enderror" value="{{ !empty($template) ? $template->position_y : old('position_y') }}">
                                    <div class="invalid-feedback">@error('position_y') {{ $message }} @enderror</div>
                                </div>
                            </dov>

                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault">{!! trans('admin/main.font_size') !!}</label>
                                    <input type="text" name="font_size" class="form-control @error('font_size') is-invalid @enderror" value="{{ !empty($template) ? $template->font_size : old('font_size') }}">
                                    <div class="invalid-feedback">@error('font_size') {{ $message }} @enderror</div>
                                </div>
                            </dov>
                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault">{!! trans('admin/main.text_color') !!}</label>
                                    <input type="text" name="text_color" class="form-control @error('text_color') is-invalid @enderror" value="{{ !empty($template) ? $template->text_color : old('text_color') }}">
                                    <div class="invalid-feedback">@error('text_color') {{ $message }} @enderror</div>
                                    <div>Example: #e1e1e1</div>
                                </div>
                            </dov>
                        </div>


                        <div class="form-group ">
                            <label class="control-label" for="inputDefault">{{ trans('admin/main.message_body') }}</label>
                            <textarea class="form-control text-left  @error('body') is-invalid @enderror" dir="ltr" rows="6" name="body" style="height: auto!important; ">{{ (!empty($template)) ? $template->body : old('body') }}</textarea>
                            <div class="invalid-feedback">@error('body') {{ $message }} @enderror</div>
                        </div>

                        <div class="form-group custom-switches-stacked">
                            <label class="custom-switch">
                                <input type="hidden" name="status" value="draft">
                                <input type="checkbox" id="status" name="status" value="publish" {{ (!empty($template) and $template->status == 'publish') ? 'checked="checked"' : '' }} class="custom-switch-input"/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description mb-0 cursor-pointer" for="status">{{ trans('admin/main.active') }}</label>
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success pull-left" id="submiter" type="button">{{ trans('public.save') }}</button>
                                <button class="btn btn-info pull-left" id="preview" type="button">{{ trans('admin/main.preview_certificate') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
    <script>
        var form = $('#templateForm');
        $('#preview').click(function (e) {
            e.preventDefault();

            form.attr('target', '_blank');
            form.attr('action', '/admin/certificates/templates/preview');
            form.attr('method', 'get');
            form.submit();
        });

        $('#submiter').click(function (e) {
            e.preventDefault();
            form.removeAttr('target');
            form.attr('action', '{{ !empty($template) ? '/admin/certificates/templates/'. $template->id .'/update' : '/admin/certificates/templates/store' }}');
            form.attr('method', 'post');
            form.submit();
        })
    </script>
@endpush
