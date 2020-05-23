{{--Модальное окно редактирования мероприятия--}}
<div class="modal" tabindex="-1" role="dialog" id="modal_02">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование мероприятия</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" id="edit_form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name='name' placeholder="Наименование"
                                   autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date"
                               class="col-md-4 col-form-label text-md-right">{{ __('Дата проведения') }}</label>
                        <div class="col-md-6">
                            <input id="date" type="date" class="form-control" name='date' placeholder="Дата"
                                   autofocus required>
                        </div>
                    </div>

{{--                    <div id="access_table">--}}
                    {{--                        <table class="table table-striped">--}}
                    {{--                            <thead>--}}
                    {{--                            <tr>--}}
                    {{--                                <th scope="col">id</th>--}}
                    {{--                                <th scope="col">Фамилия</th>--}}
                    {{--                                <th scope="col">Имя</th>--}}
                    {{--                                <th scope="col">Роль</th>--}}
                    {{--                                <th scope="col">Доступ к теме</th>--}}
                    {{--                            </tr>--}}
                    {{--                            </thead>--}}
                    {{--                            <tbody>--}}
                    {{--                            @if(count($users)>0)--}}
                    {{--                                @foreach($users as $user)--}}
                    {{--                                    <tr>--}}
                    {{--                                        <th scope="row">{{$user->id}}</th>--}}
                    {{--                                        <td>{{ $user->last_name }}</td>--}}
                    {{--                                        <td>{{ $user->name }}</td>--}}
                    {{--                                        <td>--}}
                    {{--                                            @if(count($roles)>0)--}}
                    {{--                                                @foreach($roles as $role)--}}
                    {{--                                                    {{ ($role->id == $user->role) ? $role->name : '' }}--}}
                    {{--                                                @endforeach--}}
                    {{--                                            @endif--}}
                    {{--                                        </td>--}}
                    {{--                                        <td>--}}
                    {{--                                            <div class="form-check">--}}
                    {{--                                                <input type="checkbox" class="form-check-input access" checked--}}
                    {{--                                                       @if($user->id == Auth::user()->id || $user->is_admin == 1 )--}}
                    {{--                                                       disabled  Запрет на снятие чекбокса для владельца темы и админа--}}
                    {{--                                                    @endif--}}
                    {{--                                                >--}}
                    {{--                                            </div>--}}
                    {{--                                        </td>--}}
                    {{--                                    </tr>--}}
                    {{--                                @endforeach--}}
                    {{--                            @endif--}}

                    {{--                            </tbody>--}}
                    {{--                        </table>--}}
                    {{--                    </div>--}}

                    <div class="modal-footer">
                        <button class="btn btn-my">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

