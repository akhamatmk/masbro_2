@extends('backend.layout.app2')
@section('title', 'Admin Masbro')
@section('content')
<!-- partial -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Parent Profesion </h4>           
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Provinsi
                            </th>                         
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($regencys as $key => $regency)
                        <tr>
                            <td>
                                {{ $key +1 }}
                            </td>
                            <td>
                                {{$regency->name}}
                            </td>
                            <td>
                            	@if($regency->status == 1)
                            		<a class="btn btn-primary" href="{{url('backend/admin/regency/'.$regency->id.'/'.$regency->status)}}">Aktif</a>
                            	@else
                            		<a class="btn btn-warning" href="{{url('backend/admin/regency/'.$regency->id.'/'.$regency->status)}}">Non Aktif</a>
                            	@endIf
                            </td>                            
                        </tr>
                        @endForeach
                    </tbody>
                </table><br/>
                {{ $regencys->links() }}
            </div>
        </div>
    </div>
</div>
@endSection