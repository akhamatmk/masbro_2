@extends('layout.app_chat')

@section('content')
<div class="container" style="min-height: 480px">
    <div class="row" style="margin-top: 20px">
        <div class="col-sm-6">
            <list-user :initial-users="{{ $list_user }}"></list-user>
        </div>
        <div class="col-sm-6">
            <groups :initial-groups="{{ $groups }}" :user="{{ $user }}"></groups>
        </div>
    </div>
</div>
@endsection
