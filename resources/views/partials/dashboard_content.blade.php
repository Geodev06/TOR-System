@extends('layouts.dashboard')

@section('content')
<div class=" p-5">
    <div class="row border p-3 mb-3">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12 mb-2">
                    <div class="card-body  p-3 d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <h4>Students</h4>
                            <p style="font-size: 12px;">Total no. of student records .</p>
                        </div>
                        <h1 class="fw-bold text-secondary">{{ $data['student'] }}</h1>
                    </div>
                </div>

                <div class="col-lg-12 mb-2">
                    <div class="card-body  p-3 d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <h4>Academic records</h4>
                            <p style="font-size: 12px;">Total No of academic records saved.</p>
                        </div>
                        <h1 class="fw-bold text-secondary">{{ $data['acads'] }}</h1>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-body  p-3">
                <p>chart-container</p>
            </div>
        </div>
    </div>

    <div class="row border p-3">
        <div class="col-lg-12">
            <h5>Recently released.</h4>
        </div>
    </div>
</div>
@endsection