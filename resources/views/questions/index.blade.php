@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                    <!-- Questionモデルから、データを全件取得し、$questionへ格納 -->
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="media-body">
                            <!-- question.titleを表示 -->
                            <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                            <p class="lead">
                                Asked by
                            <!--リクエストURLの取得-->
                            <a href="{{ $question->user->url}}">{{$question->user->name}}</a>
                            <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            <!-- question.bodyを表示 -->
                            {{ str_limit($question->body,250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="text-center">
                        <!-- ページネーション -->
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection