@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="col-sm-8 offset-2">

        
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">{{ Session::get('message') }}</p>
            @endif
            <div class="card">
                <div class="card-header">Question Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-9">
                        Name : {{$question->name}}
                        </div>
                        <div class="col-sm-3 text-right">
                            Posted : {{$question->created_at->diffForHumans()}}  
                        </div>
                        <div class="col-sm-12">
                        Description : {{$question->description}}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-sm-2"></div>

        <div class="col-sm-8 offset-2 py-2">
            <div class="row">
                <form action="{{ route('reply.store', $question->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12 py-1">
                        <textarea name="content" class="form-control" row="4" placeholder="Enter Your Reply"></textarea>
                    </div>
                    <div class="col-sm-12 py-1 d-grid gap-2">
                        <button type="submit" class="btn btn-success float-end">Send Reply</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-2"></div>

        <div class="col-sm-8 offset-2 py-2">
            
            <h3>Comments</h3>

                @foreach ($replies as $reply)
                <div class="card" style="border:.5px solid #ececec">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="{{ asset('img/avatar.jpg') }}" style="width:60px;height:65px;border-radius:5%"/>
                            </div>
                            <div class="col-sm-11 px-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="p-0 m-0">{{ ucfirst($reply->user->name) }}</h3>
                                        <small>Posted  {{$reply->created_at->diffForHumans()}}</small>
                                    </div>
                                    <div class="col-sm-11">
                                        {{$reply->content}}
                                    </div>
                                    <div class="col-sm-1">
                                        <button style="border:.5px solid #e2e2e2;background:transparent;border-radius:15%">reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
        </div>
                
        <div class="col-sm-2">
        </div>

       
    </div>@endsection