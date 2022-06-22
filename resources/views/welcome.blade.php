@extends('layouts.app')
@section('content')                
    <div class="card-body">
        <form method="POST" action="{{route('post.add')}}" class="box">
        @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control form-control-lg" placeholder="Title" required>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <textarea class="form-control" name="description" rows="4" type="text" value="" required></textarea>
                </div>
            </div>
                    
            <div class="text-center">
                <button type="submit" class="btn btn-md bg-gradient-primary btn-lg w-100 mt-4 mb-0"><span class="btn-inner--text">Add</span></button>
            </div>
        </form>
    </div>
@endsection
@push('js')

@endpush