@extends('layouts.app')
@section('title')
{{ __('Register') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                        <div class="alert alert-danger" role="alert" style="display: none" id="errormssg"></div>
                        <div class="alert alert-success" role="alert" style="display: none" id="sucssmssg"><i class="fas fa-check"></i> successfully registered</div>
                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                </div>
                                <input id="name_user" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-sm">E-mail</span>
                                </div>
                                <input id="email_user" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                                </div>
                                <input  id="pass_user" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-sm">Re-Password</span>
                                </div>
                                <input  id="repass_user" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <button type="button" id="reg_user" class="btn btn-primary btn-lg btn-block">{{ __('Register') }}</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
