@extends('master')

@section('title')
    Message Header Analyzer
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <textarea class="form-control" rows="3" id="headers" placeholder="Paste your message headers here ~"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Analyze!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
