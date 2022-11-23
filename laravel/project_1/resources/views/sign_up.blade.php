@extends('sign_in')

{{-- TODO: FINISH IT --}}


{{-- SECTION: "Variables" --}}

@section('page_title'           , 'Sign Up')
@section('card_title__name'     , 'Sign Up')

{{-- !SECTION: "Variables" --}}


{{-- SECTION: Register Form --}}
@section('card_form')
<form role="form" class="text-start" action="/sign-in" method="POST">

    <!-- ANCHOR: Name -->
    <div class="input-group input-group-static my-3">
        <label class="">First Name</label>
        <input type="text" name="firstName" class="form-control">
    </div>

    <div class="input-group input-group-static my-3">
        <label class="">Last Name</label>
        <input type="text" name="username" class="form-control">
    </div>

    <!-- ANCHOR: Username -->
    <div class="input-group input-group-static my-3">
        <label class="">Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <!-- ANCHOR: Email -->
    <div class="input-group input-group-static my-3">
        <label class="">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <!-- ANCHOR: Password -->
    <div class="input-group input-group-static mb-3">
        <label class="">Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <!-- ANCHOR: Password Confirm -->
    <div class="input-group input-group-static mb-3">
        <label class="">Re-enter Password</label>
        <input type="password" class="form-control">
    </div>

    <!-- ANCHOR: Sign-in Button -->
    <div class="text-center">
        <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign up</button>
    </div>

    <!-- ANCHOR: Sign-up Text Button -->
    <p class="mt-4 text-sm text-center">
        Already have an account?
        <a href="/sign-in" class="text-primary text-gradient font-weight-bold">Sign in</a>
    </p>

</form>
{{-- @show --}}
@endsection
{{-- !SECTION: Register Form --}}
