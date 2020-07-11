@if(count($messages)>0)
    @foreach($messages as $message)
        <div class="row justify-content-center " >
            <div class="col-md-12">
                <div class="form-group" >
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <div class="row">
                                <div class="col col-md-2 text-center">
                                    <h6> {{ $message->user->last_name }} {{ $message->user->name }} </h6>
                                    <img class="img-thumbnail " style="border-radius: 50%;" src="{{ $message->user->photo }}"
                                         alt="{{ $message->user->name }} ">

                                </div>
                                <div class="col col-md-9">
                                    <div class="row ml-1">
                                        <small>id: {{ $message->id }}</small>&nbsp&nbsp&nbsp&nbsp
                                        <small>Создано: {{date("d.m.Y",strtotime($message->created_at))}}</small>&nbsp&nbsp&nbsp&nbsp
                                        <small id="changed">Изменено:</small>
                                    </div>
                                    <div class="row mt-4 ml-1" id="messages">
                                        {{ $message->message }}
                                    </div>


                                </div>
                                <div class="col col-md-1 ">
                                    <div class="float-right">
                                        <a href="#" data-toggle="modal" role="button"
                                           data-target="#URLForMessage" data-content="{{ $message->id }}">
                                            <i class="fa fa-share-alt text-secondary"></i>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="float-right">
                                        <a href="#" data-toggle="modal" data-target="#modal_07" data-content="
{{--@foreach($messags as $messag)--}}
                                        {{ $message }}
{{--                                        @endforeach--}}
                                            " title="Ответить">
                                            <i class="fa fa-reply text-secondary"></i>
                                        </a>
                                    </div><br>

                                    <div class="float-right" id="{{ $message->id }}">
<script>

    let id_message={{$message->id}};
    {{--let id_for= {{count($messages)}};--}}
    // for(i=0; i<id_for.length; i++){

        // alert(id_message);
    // }
</script>
                                        <a href="#" data-toggle="modal" data-target="#modal_04" data-content="{{ $message }}" title="Редактировать">
                                            <i class="fa fa-pencil-square-o text-secondary"></i>

                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                        {{--                                   вывод ответа на сообщение--}}
                        @foreach($message->answers as $answer)
                        <li class="list-group-item " >
                            <div class="row" >
                                <div class="col-md-2 text-center">  </div>
                                <div class="col col-md-2 text-center" style="border-left: 2px solid #aac7d6 ">
                                    <h6> {{ $answer->user->last_name }} {{ $answer->user->name }} </h6>
                                    <img class="img-thumbnail " style="border-radius: 50%;" src="{{ $answer->user->photo }} "
                                         alt="{{ $answer->user->name }} ">

                                </div>
                                <div class="col col-md-7">
                                    <div class="row ml-1">
                                        <small>id: {{ $answer->id }}</small>&nbsp&nbsp&nbsp&nbsp
                                        <small>Создано: {{date("d.m.Y",strtotime($answer->created_at))}}</small>&nbsp&nbsp&nbsp&nbsp
                                        <small id="">Изменено:</small>
                                    </div>
                                    <div class="row mt-4 ml-1">
                                        {{$answer->body}}
                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endforeach
    <div >{{ $messages->links() }}</div>
    @include('modal.URLForMessage')
    @include('modal.editMessage')
    @include('modal.AnswerMessage')

@endif

