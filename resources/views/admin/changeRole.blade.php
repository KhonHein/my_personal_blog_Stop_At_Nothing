@extends('admin.master')
@section('title','AdminDashboard')
@section('content')
<!--Main Section Start-->
<div class="container-xxl py-5 mb-5">
    <button class="btn btn-dark ms-4" onclick="history.back()"><i class="fa-solid fa-left-long" class="backArrow"></i></button>
    <div class="container my-5 py-5 px-lg-5 w3-container w3-center w3-animate-zoom">
        <div class="row g-5 py-5">
                <table>
                    <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>name</th>
                        <th>email</th>
                        <th>address</th>
                        <th>phone</th>
                        <th>gender</th>
                        <th>role</th>
                        <th></th>
                    </tr>
                    <tbody>

                        @foreach($users as $u)
                        <form action="{{ route('ajax#changeRole') }}" method="POST" class="row g-5 py-5 d-flex">
                         @csrf
                        <tr class="my-2">
                            <input type="hidden" name="user_id_role" value="{{ $u->id }}">
                            <td>{{ $u->id }}</td>
                            <td>
                                @if($u->image !== null)
                                <img class="img-fluid border rounded-5 mouseHoverCSS"  src="{{  asset('storage/'.$u->image )}}" alt="" srcset="" style="width:40px; height:40px;">
                                @else
                                    @if($u->gender === 'male')
                                        <img class="img-fluid border rounded-5 mouseHoverCSS" src="{{ asset('img/coverImg.png') }}" alt="" style="width:40px; height:40px;">
                                        @elseif($u->gender ==='female')
                                        <img class="img-fluid  border rounded-5 mouseHoverCSS" src="{{ asset('img/femaleCover.png') }}" alt="" style="width:40px; height:40px;">
                                        @elseif($u->gender === null)
                                        <img class="img-fluid  border rounded-5 mouseHoverCSS" src="{{ asset('img/null.png') }}" alt="" style="width:40px; height:40px;">
                                    @endif
                                @endif
                            </td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->address }}</td>
                            <td>{{ $u->phone }}</td>
                            <td>{{ $u->gender }}</td>
                            <td>
                                <select name="userRole" class="changeRoleSelect" onchange="changeRoleFun()">
                                        <option class="form-control"  value="admin" @if($u->role == 'admin') selected @endif >admin</option>
                                        <option class="form-control"  value="pro" @if($u->role == 'pro') selected @endif >pro</option>
                                        <option class="form-control"  value="user" @if($u->role == 'user') selected @endif >user</option>
                                </select>
                            </td>
                            <td>
                                @if($u->role === Auth::user()->role)
                                <button type="submit" class="btn btn-sm btn-dark" disabled>me</button>
                                @else
                                <button type="submit" class="btn btn-sm btn-dark">change</button>
                                @endif
                            </td>
                        </tr>
                        </form>
                        @endforeach

                    </tbody>
                </table>
        </div>
    </div>
</div>

<!--Main Section end -->
@endsection

