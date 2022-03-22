@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-8 offset-2">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">{{ Session::get('message') }}</p>
            @endif
            <h3 class="text-center">All Questions</h3>
            <div class="card">
                @foreach ($questions as $question)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                            Name : {{$question->name}}
                            </div>
                            <div class="col-sm-4 text-right">
                            </div>
                            <div class="col-sm-7">
                            Description : {{$question->description}}
                            </div>
                            <div class="col-sm-5 text-right">
                             Posted : {{$question->created_at->diffForHumans()}}  
                             <a href="{{ route('forum.show', $question->id) }}" class="btn btn-success btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        </div> 
    </div>
@endsection