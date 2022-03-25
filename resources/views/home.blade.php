@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <table>
                                   <th>Name</th>
                                   <th>Phone</th>
                        @foreach($data as $da)
                                    <tr>
                                        <td> {{$da->name}}

                                        </td>
                                        <td>{{$da->phone}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
