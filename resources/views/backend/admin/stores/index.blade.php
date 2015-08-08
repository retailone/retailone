@extends('backend.layout')

@section('css')
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('contents')
	<div class="row">
		<div class="col-md-12">
            {!! $html->table() !!}
		</div>
	</div>
@stop

@section('javascript')
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    {!! $html->scripts() !!}
@stop
