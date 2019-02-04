@extends('backend.layout.app2')
@section('title', 'Admin Masbro')
@section('content')
<!-- partial -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">District</h4>           
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
                                Kota
                            </th>                         
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($districts as $key => $district)
                        <tr>
                            <td>
                                {{ $key +1 }}
                            </td>
                            <td>
                                {{$district->regency->name}}
                            </td>
                            <td>
                                {{$district->name}}
                            </td>
                        </tr>
                        @endForeach
                    </tbody>
                </table><br/>
                {{ $districts->links() }}
            </div>
        </div>
    </div>
</div>
@endSection