@extends('layouts.main-layout')

@section('import')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="{{ asset('/js/partials/chart.js') }}"></script>
@endsection

@section('content')



<div id="stats" class="container margintop">
    <div class="row">
        <h2 class="title">Statistics</h2>
    </div>
    <div calss="row">
        <div class="col-md-4 offset-md-5">
            <h4>Visits</h4>
        </div>
        <canvas id="myVisitsChart"></canvas>
    </div>
    <div calss="row">
        <div class="col-md-4 offset-md-5">
            <h4>Messages</h4>
        </div>
        <canvas id="myMessagesChart"></canvas>
    </div>
</div>

@endsection