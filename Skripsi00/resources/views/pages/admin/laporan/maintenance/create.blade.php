@extends('layouts.main')

@section('content')
@include('includes.navbar')
<div class="container">
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-4 rounded-pill fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <a href="{{route('admin.index.burner')}}" class="text-primary mx-2">
                                Data Inventory
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Create
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-3 text-center">
                        <div class="badge bg-danger text-white">
                            Today : 
                            <span id="timer"></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mx-auto">
                <div class="m-auto rounded text-dark">
                    <form action="" class="mx-auto" id="form-burner-system">
                        @csrf
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('burner_system.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Burner System</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="nip">NIP</label>
                                    <select name="nip" id="nip" class="form-select">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Unit Pembangkit</label>
                                    <select name="unit" id="unit" class="form-select @error('unit') is-invalid @enderror" name="unit" required autocomplete="unit">
                                        <option value="" selected hidden>-- Pilih Unit --</option>
                                        <option value="Unit 3" id="show-form">Unit 3</option>
                                        <option value="Unit 4">Unit 4</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="tanggal_update">Tanggal Update</label>
                                    <input type="date" name="tanggal_update" id="tanggal_update" class="form-control" required autocomplete="tanggal_update">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="jam_update">Jam Update</label>
                                    <input type="time" name="jam_update" id="jam_update" class="form-control" required autocomplete="jam_update">
                                </div>
                            </div>
                            <hr class="text-danger">
                            <div class="text-center text-danger fw-bold mb-4">
                                Form Burner
                            </div>
                            <div class="col-lg-6 col-md-6 fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status Burner 1</label>
                                    <select name="status_burner1" id="status_burner1" class="form-select @error('status_burner1') is-invalid @enderror" name="status_burner1" required autocomplete="status_burner1">
                                        <option value="" selected hidden>-- Pilih Status --</option>
                                        <option value="Ready" id="show-form">Ready</option>
                                        <option value="Not Ready">Not Ready</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="keterangan">keterangan Burner 1</label>
                                    <textarea name="ket_burner1" id="ket_burner1" cols="30" rows="2" class="form-control">Normal</textarea>
                                </div>
                                <hr>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status Burner 2</label>
                                    <select name="status_burner2" id="status_burner2" class="form-select @error('status_burner2') is-invalid @enderror" name="status_burner2" required autocomplete="status_burner2">
                                        <option value="" selected hidden>-- Pilih Status --</option>
                                        <option value="Ready" id="show-form">Ready</option>
                                        <option value="Not Ready">Not Ready</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="ket_burner2">keterangan Burner 2</label>
                                    <textarea name="ket_burner2" id="ket_burner2" cols="30" rows="2" class="form-control">Normal</textarea>
                                </div>
                            </div>
                            {{-- =============== --}}
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status Burner 3</label>
                                    <select name="status_burner3" id="status_burner3" class="form-select @error('status_burner3') is-invalid @enderror" name="status_burner3" required autocomplete="status_burner3">
                                        <option value="" selected hidden>-- Pilih Status --</option>
                                        <option value="Ready" id="show-form">Ready</option>
                                        <option value="Not Ready">Not Ready</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="keterangan">keterangan Burner 3</label>
                                    <textarea name="ket_burner3" id="ket_burner3" cols="30" rows="2" class="form-control">Normal</textarea>
                                </div>
                                <hr>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status Burner 4</label>
                                    <select name="status_burner4" id="status_burner4" class="form-select @error('status_burner4') is-invalid @enderror" name="status_burner4" required autocomplete="status_burner4">
                                        <option value="" selected hidden>-- Pilih Status --</option>
                                        <option value="Ready" id="show-form">Ready</option>
                                        <option value="Not Ready">Not Ready</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="ket_burner4">keterangan Burner 4</label>
                                    <textarea name="ket_burner4" id="ket_burner4" cols="30" rows="2" class="form-control">Normal</textarea>
                                </div>
                                <input type="hidden" name="status_equipment_id" value="1">
                                <input type="hidden" name="catatan_spv" value="-">
                            </div>
                            <div class="d-grid gap-2 px-4 py-2">
                                <button type="submit" class="btn btn-success text-center" id="btn-save">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection

{{-- @push('add-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#btn-save').click((e)=>{

                e.preventDefault();

                $.ajax({
                    url: "{{route('burner_system.update')}}",
                    method: 'POST',
                    data: $('#form-burner-system').serialize(),
                    dataType: 'JSON',
                    success: function(data){
                        if(data.success){
                            swal({
                                title: "Successully!",
                                text: "Laporan Berhasil Disimpan",
                                icon: "success",
                                button: "simpan",
                            });
                            // $("#form-burner-system")[0].reset(),
                            $("span").remove('#error')
                            window.location = "{{route('burner_system.index')}}"
                        }else{
                            console.log('gagal');
                        }
                    },
                    error: function(err){
                        $.each(err.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger" id="error">' +error+ '</span>')
                        })
                    }
                });
            });
        });
    </script>   
@endpush --}}
