<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group {{ $errors->first('title', 'has-error') }}">
                    {!! Form::label('title', 'Название:') !!} <abbr>*</abbr>
                    {!! Form::text('title', $page->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Содержание:') !!}
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group {{ $errors->first('meta_title', 'has-error') }}">
                    {!! Form::label('meta_title', 'Мета-тег Title:') !!} <abbr>*</abbr>
                    {!! Form::text('meta_title', $page->meta_title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description', 'Мета-тег Description:') !!}
                    {!! Form::textarea('meta_description', $page->meta_description, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group {{ $errors->first('slug', 'has-error') }}">
                    {!! Form::label('slug', 'Алиас:') !!} <abbr>*</abbr>
                    {!! Form::text('slug', $page->slug, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Статус:') !!}
                    {!! Form::select('status', ['0' => 'Скрыто', '1' => 'Опубликовано'], $page->status, ['class' => 'form-control']) !!}
                </div>
                @if ($page->created_at)
                    <div class="form-group">
                        {!! Form::label('created_at', 'Дата создания:') !!}
                        {!! Form::text('created_at', $page->created_at, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="form-info"><abbr>*</abbr> - поля, обязательные для заполнения</div>