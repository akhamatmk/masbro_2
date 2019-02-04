@extends('backend.layout.app2')
@section('title', 'Admin Masbro')
@section('content')
<!-- partial -->


<link rel="stylesheet" href="{{ asset('css/easyTree.css') }}">

<style type="text/css">
	.main-tree-menu{
		padding : 20px;
	}
</style>

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Filter User</h4>
            <div class="easy-tree">
            	{{ buildMenu($filters) }}		        
		    </div>
        </div>
    </div>
</div>
@endSection

@section('js')
    <link rel="stylesheet" href="https://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
	<script src="{{ asset('js/easyTree.js') }}"></script>
    <script type="text/javascript">

        $(function() {
           function init() {
	            $('.easy-tree').EasyTree({
	                addable: true,
	                editable: true,
	                deletable: true
	            });
	        }

        	window.onload = init();
        });
    </script>
@endSection