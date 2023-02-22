@extends('layouts.dashboard')

@section('data-management')
<div class="p-5">

    <h6 class="text-muted">Data management</h6>
    <div class="d-flex justify-content-between">
        <p></p>
        <div class="d-flex">
            <a href="{{ route('subject.manage') }}" class="btn btn-primary btn-sm"> <span class="bx bx-book"></span> Subjects</a>
            <a href="{{ route('subject.manage') }}" class="btn btn-secondary btn-sm text-white ms-2"> <span class="bx bx-user"></span> Students</a>
        </div>
    </div>
</div>
@endsection