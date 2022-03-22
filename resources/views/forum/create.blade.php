@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">Ask A Question</div>
                <div class="card-body">
                    <form action="{{route('forum.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input name="name" class="form-control" placeholder="Enter Question"></p>
                        <textarea name="description" class="form-control" placeholder="Enter Description" row="4"></textarea></p>
                        <button class="btn btn-success float-right" type="submit"> Post Question </button>
                    </form>
                </div>
            </div>
        </div> 
    </div>
@endsection