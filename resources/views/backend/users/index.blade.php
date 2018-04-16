@extends('backend.layouts.default')

@section('content')
    <div class="container-fluid">
        <h1 class="heading-title">Пользователи <small>Управление</small></h1>
        <a class="btn btn-success pull-right" href="{{ route('admin.users.create') }}"><i class="la la-plus"></i> Добавить</a>
        <div class="panel">
            <div class="panel-header">
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::open(['route' => 'admin.users.index', 'method' => 'get']) !!}
                            <div class="input-group">
                                {!! Form::text('s', null, ['class' => 'form-control', 'placeholder' => 'Искать...']) !!}
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit"><i class="la la-search"></i> Поиск</button>
                                </span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>E-mail</th>
                        <th>Slug</th>
                        <th>имя</th>
                        <th>Роль</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profile->slug }}</td>
                                    <td>{{ $user->profile->first_name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Выбрать <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ route('admin.users.edit', $user->id) }}"><i class="la la-pencil"></i> Редактировать</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $user->id }}"><i class="la la-trash"></i> Удалить</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="5">
                                <h4 class="text-center">Нет результатов</h4>
                            </td>
                        @endif
                    </tbody>
                </table>
            </div>
            @if (count($users) > 0)
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="table-info">Страница {{ $users->currentPage() }} из {{ $users->lastPage() }}</span>
                        </div>
                        <div class="col-md-6 text-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => ['admin.users.destroy', null], 'method' => 'delete', 'id' => 'form-delete']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel">Удалиние</h3>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить данную страницу?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="la la-check"></i> Отмена</button>
                        <button type="submit" class="btn btn-danger"><i class="la la-trash"></i> Удалить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        (function($) {
            var form = $('#form-delete'),
                modal = $('#modal-delete'),
                target,
                id;

            modal.on('show.bs.modal', function(e) {
                target = $(e.relatedTarget);
                id = target.data('id');
            });

            form.on('submit', function(e) {
                e.preventDefault();

                if (id) {
                    $.ajax({
                        url: form.attr('action') + '/' + id,
                        method: 'post',
                        data: form.serialize(),
                        dataType: 'json',
                        beforeSend: function() {
                            form.find(':button').attr('disabled', true);

                            $('.alert').remove();
                        },
                        success: function(json) {
                            var html = '';

                            if (json['success']) {
                                html += '<div class="alert alert-success alert-dismissible" role="alert">';
                                html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                html += json['success'];
                                html += '</div>';

                                target.closest('tr').remove();
                            }

                            if (json['error']) {
                                html += '<div class="alert alert-danger alert-dismissible" role="alert">';
                                html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                html += json['error'];
                                html += '</div>';
                            }

                            $('.panel').before(html);
                        },
                        complete: function() {
                            form.find(':button').attr('disabled', false);

                            modal.modal('hide');
                        }
                    });
                }
            });
        })(jQuery)
    </script>
@endpush