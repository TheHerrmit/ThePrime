
@extends('admin.main')

@section('content')
  <table class="table">
      <thead>
        <tr>
            <th style="width: 45px">ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Update</th>
            <th>&nbsp;</th>
        </tr>
      </thead>
    <tbody>
        {!! \App\Helpers\Helper::menus($menus)!!}
    </tbody>
  </table>
@endsection

