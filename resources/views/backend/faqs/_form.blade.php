<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group {{ $errors->first('title', 'has-error') }}">
                    {!! Form::label('title', 'Название:') !!} <abbr>*</abbr>
                    {!! Form::text('title', $faqs->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Содержание:') !!}
                    {!! Form::textarea('meta_description', $faqs->content, ['name' => 'content', 'data-editor' => 'summernote']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('status', 'Статус:') !!}
                    {!! Form::select('status', ['0' => 'Скрыто', '1' => 'Опубликовано'], $faqs->status, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sort_order', 'Порядок сортировки:') !!}
                    {!! Form::text('sort_order', $faqs->sort_order, ['class' => 'form-control']) !!}
                </div>
                @if ($faqs->created_at)
                    <div class="form-group">
                        {!! Form::label('created_at', 'Дата создания:') !!}
                        {!! Form::text('created_at', $faqs->created_at, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="form-info"><abbr>*</abbr> - поля, обязательные для заполнения</div>