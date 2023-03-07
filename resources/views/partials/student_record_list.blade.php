@if(count($student[0]->student_record) > 0)
<div class="col-lg-12">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }

        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
    </style>
    <div class="accordion accordion-flush card" id="accordionFlushExample">
        @foreach($student[0]->student_record as $record)
        <div class="accordion-item ">

            <h2 class="accordion-header" id="item_{{$record->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#id_{{$record->id}}" aria-expanded="false" aria-controls="id_{{$record->id}}">
                    <span class="fw-bold container-fluid"> ACADEMIC YEAR {{ $record->school_year}}
                        <span class="badge bg-secondary float-end"> Created {{ $record->created_at->format('m-d-Y')}} </span>
                    </span>

                </button>
            </h2>

            <div id="id_{{$record->id}}" id="record-container" class="accordion-collapse collapse" aria-labelledby="item_{{$record->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body" id="button-container">
                    <div class="d-flex justify-content-between">
                        <p style="font-size:12px">Academic record information</p>
                        <div>
                            <span class="btn-edit" data-id="{{ $record->id }}">
                                <i class="fs-3 bx bx-edit text-secondary mr-3"></i>
                            </span>
                            <span class="btn-delete" data-id="{{ $record->id }}">
                                <i class=" fs-3 bx bx-trash text-danger mr-3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <table>
                                <!-- HEADER -->
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">school</span>
                                                <span class="text-uppercase text-muted">{{ $record->school }}</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">school id</span>
                                                <span class="text-uppercase text-muted">{{ $record->school_id }}</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">district</span>
                                                <span class="text-uppercase text-muted">{{ $record->district }}</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">division</span>
                                                <span class="text-uppercase text-muted">{{ $record->division }}</span>
                                            </div>
                                        </th>
                                        <th colspan="4">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">region</span>
                                                <span class="text-uppercase text-muted">{{ $record->region }}</span>
                                            </div>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">Classified as grade</span>
                                                <span class="text-uppercase text-muted">{{ $record->classified_grade }}</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">section</span>
                                                <span class="text-uppercase text-muted">{{ $record->section }}</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">school year</span>
                                                <span class="text-uppercase text-muted">{{ $record->school_year }}</span>
                                            </div>
                                        </th>
                                        <th colspan="4">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-uppercase">teacher/adviser</span>
                                                <span class="text-uppercase text-muted">{{ $record->adviser }}</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <!-- END HEADER -->

                                <tbody>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td>Learning areas</td>
                                        <td colspan="4">Quarterly rating</td>
                                        <td>Final rating</td>
                                        <td>Remarks</td>
                                    </tr>

                                    @foreach($record->data as $data)

                                    <tr>
                                        @foreach($data as $subject => $quarter)
                                        <td>{{$subject}}</td>

                                        @foreach($quarter as $grades)
                                        <td>{{$grades}}</td>
                                        @endforeach

                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<div class="col-lg-12 mx-4">
    <p>No academic records found!</p>
</div>
@endif