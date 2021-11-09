@extends('master')

@section('title')
    Message Header Analyzer
@endsection

@section('post-css')
    <script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/stacktrace.js/2.0.2/stacktrace-with-promises-and-json-polyfills.min.js"></script>
    <script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <textarea id="inputHeaders" class="form-control" rows="3" placeholder="Paste your message headers here ~"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="analyzeButton" class="btn btn-primary">Analyze!</button>
                    <button id="clearButton" class="btn btn-default">Clear</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mt-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="summary" class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">Message ID</td>
                                    <td id="Message-IDSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold"><a href="#">Subject</a></td>
                                    <td id="SubjectSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">From</td>
                                    <td id="FromSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">Return path</td>
                                    <td id="Return-PathSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">To</td>
                                    <td id="ToSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">Reply to</td>
                                    <td id="Reply-ToSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">Cc</td>
                                    <td id="CCSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">Archived at</td>
                                    <td id="Archived-AtSUMVal" class="col-md-9">-</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 font-weight-bold">Creation time</td>
                                    <td id="DateSUMVal" class="col-md-9">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pre-js')
    <script src="{{ asset('vendor/stephenegriffin/MHA/diag.js') }}"></script>
@endsection

@section('post-js')
    <script src="{{ asset('vendor/stephenegriffin/MHA/Strings.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Dates.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/poster.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Antispam.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/ForefrontAntispam.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/2047.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Other.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Received.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Summary.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Headers.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/Table.js') }}"></script>
    <script src="{{ asset('vendor/stephenegriffin/MHA/StandAlone.js') }}"></script>
@endsection
