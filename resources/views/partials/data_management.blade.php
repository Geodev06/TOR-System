@extends('layouts.dashboard')

@section('data-management')
<!-- datatables -->
<script src="{{ asset('./dataTables/datatables.js') }}"></script>
<link rel="stylesheet" href="{{ asset('./dataTables/datatables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('./dataTables/datatables.css') }}" />
<script src="{{ asset('./dataTables/datatables.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('./css/table.css')}}">

<div class="p-5">
    <h6 class="text-muted">Data management</h6>
    <div class="d-flex justify-content-between">
        <button class="btn btn-success w-auto btn-sm" id="btn-add-student"> <span class="bx bx-plus"></span> Add student</button>
        <div class="d-flex">
            <a href="{{ route('subject.manage') }}" class="btn btn-primary btn-sm"> <span class="bx bx-book"></span> Subjects</a>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <div class="mb-2 d-flex align-items-baseline justify-content-between">
                <h3 class="fw-bold">Students</h3>
                <x-loader />
            </div>

            <table class="display nowrap w-100 table-striped " id="table-students">
                <thead>
                    <tr>
                        <th>LRN</th>
                        <th>Student name</th>
                        <th>Sex</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>
<!-- add student modal -->
<div class="modal fade" id="addStudentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addSubj" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-5">
                <h4 class="mb-3">Add student</h4>
                <form action="" id="studentForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Given name" name="firstname" />
                                <label for="">Given name.</label>
                                <span class="error_firstname text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Middle name" name="middlename" />
                                <label for="">Middle name (optional).</label>
                                <span class="error_middlename text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Sur name" name="lastname" />
                                <label for="">Sur name.</label>
                                <span class="error_lastname text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" autocomplete="off" name="birthdate" />
                                <label for="">Birthdate.</label>
                                <span class="error_birthdate text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3 d-flex align-items-center justify-content-around">
                                <div class="form-check">
                                    <input type="radio" name="sex" value="0" class="form-check-input" id="radio" checked>
                                    <label for="radio" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="sex" value="1" class="form-check-input" id="radio">
                                    <label for="radio" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Sur name" name="province" />
                                    <label for="">Birth place (Province).</label>
                                    <span class="error_province text-danger error-text"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="town" placeholder="Town" />
                                <label for="">Birth place (Town).</label>
                                <span class="error_town text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="barrio" placeholder="Barrio" />
                                <label for="">Birth place Barrio (optional).</label>
                                <span class="error_barrio text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="guardian" placeholder=">Guardian name" />
                                <label for="">Guardian name.</label>
                                <span class="error_guardian text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="guardian_address" placeholder=">Guardian address" />
                                <label for="">Guardian (address).</label>
                                <span class="error_guardian_address text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="guardian_occupation" placeholder=">Guardian occupation" />
                                <label for="">Guardian occupation (optional).</label>
                                <span class="error_guardian_occupation text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="elem_school" placeholder="Graduated elementary school" />
                                <label for="">Graduated elementary school.</label>
                                <span class="error_elem_school text-danger error-text"></span>
                            </div>
                        </div>


                        <div class="col-lg-3">
                            <div class="form-floating mb-3">
                                <select name="elem_school_year" id="select" class="form-select">
                                    <option value="">Choose year</option>
                                    <option value="1998">Option 2</option>
                                    <option value="1992">Option 3</option>
                                </select>
                                <label for="select">Elem (School year)</label>
                                <span class="error_elem_school_year text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-floating mb-3">
                                <input type="tezt" class="form-control" autocomplete="off" name="elem_years" placeholder="No. of Years" />
                                <label for="">Elem. (Years completed).</label>
                                <span class="error_elem_years text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" autocomplete="off" name="lrn" placeholder="Learning reference number. (12 - digits)" />
                                <label for="">Learning reference number. (12 - digits).</label>
                                <span class="error_lrn text-danger error-text"></span>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" autocomplete="off" name="gen_ave" placeholder="Gen ave." />
                                <label for="">General average.</label>
                                <span class="error_gen_ave text-danger error-text"></span>
                            </div>
                        </div>


                    </div>
                    <div class="d-flex float-end">
                        <button type="button" class="btn btn-default btn-sm m-2" id="btn-close">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm m-2"> <i class="bx bx-save"></i> Save</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<!-- end modal -->

<x-message-alert />
<script>
    var table = $('#table-students').DataTable({
        'lengthMenu': [
            [10, 10, 15, 20, 50, -1],
            [10, 10, 15, 20, 50, 'All'],
        ]
    })

    function loadSubjects() {
        $.ajax({

            url: "{{ route('student.get') }}",
            type: 'get',
            dataType: 'json',
            beforeSend: function() {
                $('#loader').css('display', 'block')
            },
            success: function(data) {
                $('#loader').css('display', 'none')
                table.clear().draw()
                for (let i = 0; i < data.length; i++) {
                    var middlename = data[i].middlename === null ? data[i].middlename : ''
                    var name = data[i].lastname + ' ' + data[i].firstname + ' ' + middlename
                    var sex = data[i].sex === 0 ? 'Male' : 'Female'
                    var btn_view = '<button class="btn btn-info btn-sm text-white" data-bs-toggle="tooltip" title="View"><span class="bx bx-show-alt"></span></button>'
                    var btn_edit = '<button class="btn btn-success btn-sm text-white"><span class="bx bx-edit"></span></button>'
                    var btn_delete = '<button class="btn btn-danger btn-sm text-white"><span class="bx bx-trash"></span></button>'
                    table.row.add([data[i].lrn, name, sex, btn_view + btn_edit + btn_delete]).draw()
                }
            },
            error: function() {
                showErrorAlert('Connection to server error.')
            }
        })
    }

    loadSubjects()

    function showAlert(msg) {
        $('#msgAlert').modal('show')
        $('#msgAlert-msg').text(msg)
        $('#msgAlert-btn').css('display', 'inherit')
    }

    function showErrorAlert(msg) {
        $('#msgAlert').modal('show')
        $('#msgAlert-msg').text(msg)
        $('#msgAlert-icon').addClass('bx bx-error-circle')
    }

    $('#studentForm').on('submit', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ route('studentinfo.store') }}",
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {

                $('#studentForm :input').each(function() {
                    $(this).removeClass('is-invalid')
                })
                $('.error-text').text('')

                $('#studentForm :input').prop("disabled", true)
            },
            success: (data) => {
                $('#studentForm :input').prop("disabled", false)
                console.log(data)
                if (data.status === 0) {
                    $.each(data.error, function(prefix, val) {

                        $('.error_' + prefix).text(val[0]);

                        $("input[name=" + prefix + "]").addClass('is-invalid')
                    })
                }

                if (data.status === 200) {
                    $('#studentForm')[0].reset()
                    $('#addStudentModal').modal('hide')
                    showAlert(data.msg)

                    loadSubjects()
                }
            },
            error: (err) => {
                showErrorAlert(err)
            }
        })
    })

    $('#btn-add-student').click(() => $('#addStudentModal').modal('show'))
    $('#btn-close').click(() => $('#addStudentModal').modal('hide'))
</script>
@endsection