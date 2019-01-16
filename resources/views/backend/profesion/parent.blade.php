@extends('backend.layout.app2')
@section('title', 'Admin Masbro')
@section('content')
<!-- partial -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Parent Profesion </h4>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('backend-add-parent-profesion') }}">Add</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Meta Search
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($categorys as $key => $value)
                        <tr>
                            <td>
                                {{ $key +1 }}
                            </td>
                            <td>
                                {{$value->name}}
                            </td>
                            <td>
                                {{ $value->meta_search }}
                            </td>
                            <td>
                                <a href="{{ url('backend/admin/profesion/parent/edit/'.$value->id) }}" class="btn btn-inverse-primary btn-fw">Edit</a>
                                <a data-id="{{ $value->id }}"  style="margin-left: 10px" class="btn btn-inverse-danger btn-fw delete">delete</a>
                            </td>       
                        </tr>
                        @endForeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endSection

@section('js')
    <script type="text/javascript">
        $(function() {
            @if(Session::has('message-succes'))
                swal("Good job!", "{{ Session::get('message-succes') }}", "success");
            @endIf

            @if(Session::has('message-error'))
                swal("Attention!", "{{ Session::get('message-error') }}", "error");
            @endIf

            $(".delete").click(function(){
                let id = $(this).data('id');
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    document.location = "{{ url('backend/admin/profesion/delete') }}/"+id;
                  } else {
                    swal("Your imaginary file is safe!");
                  }
                });
            });
        });
    </script>
@endSection