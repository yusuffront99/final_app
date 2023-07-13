<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 badge bg-primary" id="exampleModalLabel">EQUIPMENT REPAIR FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="m-2">
            <form action="" id="form-maintenance-burner">
                <div class="form-group mb-2 fw-bold">
                    <label for="">Kode Perbaikan <i class='bx bx-info-circle text-warning' style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Kode Perbaikan baru muncul setelah status laporan peralatan Resolved"></i></label>
                    <select name="burner_system_id" id="repair-code" class="form-select text-warning fw-bold" required>
                        <option value="" selected disabled>-- Repair Code --</option>
                        @foreach ($data_burner_resolved as $cd)
                            <option value="{{$cd->id}}" class="fw-bold text-danger"><?php echo substr($cd->id, 0, 8)?></option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" id="user_id">
                <div class="form-group mb-2 fw-bold">
                    <label for="">Kategori</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="BURNER SYSTEM">BURNER SYSTEM</option>
                    </select>
                </div>
                <div class="row">
                  <label for="" class="fw-bold">Spare Part Item <i class='bx bx-info-circle text-warning' style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Apabila Spare Part Item yang diganti hanya 1 item, maka item sebelahnya tidak perlu dipilih"></i></label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                        <select name="item_sp_1" id="item_sp_1" class="form-select" required>
                            <option value="-">-- Spare Part --</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2 fw-bold">
                        <select name="item_sp_2" id="item_sp_2" class="form-select">
                            <option value="-">-- Spare Part --</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2 fw-bold">
                        <select name="item_sp_3" id="item_sp_3" class="form-select">
                            <option value="-">-- Spare Part --</option>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label for="" class="fw-bold">Harga Item (Rupiah) <i class='bx bx-info-circle text-warning' style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Masukkan nilai harga menyesuaikan Spare Part Item yang dipilih"></i></label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_price_1" id="item_price_1" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_price_2" id="item_price_2" class="form-control" value="0">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_price_3" id="item_price_3" class="form-control" value="0">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label for="" class="fw-bold">Total Item (Jumlah) <i class='bx bx-info-circle text-warning' style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Masukkan total jumlah spare part yang digunakan berdasarkan item yang dipilih"></i></label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="number" name="item_total_1" id="item_total_1" class="form-control" value="0" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="number" name="item_total_2" id="item_total_2" class="form-control" value="0">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="number" name="item_total_3" id="item_total_3" class="form-control" value="0">
                    </div>
                  </div>
                </div>
                
                <div class="form-group mb-2 fw-bold">
                    <label for="">Penanganan</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" required></textarea>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </div>
</div>

@push('add-script')
<script>
  $(document).ready(function(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#repair-code').on('change', function() {
          var optionId = $(this).val();

          $.ajax({
                url: 'burner/' + optionId,
                type: 'get',
                data: {},
                success:function(response){
                  if(response.success == true){
                        $('#user_id').val(response.data.user_id);
                    }
                }
            });
        });

        $('#create-maintenance').click(function(){
            $('#form-maintenance-burner').trigger("reset");
        })

        $('#save').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
                url: "{{route('maintenance.store')}}",
                method: 'POST',
                data: $('#form-maintenance-burner').serialize(),
                dataType: 'JSON',
                success: function(data){
                    if(data.success){
                        swal({
                            title: "Successully!",
                            text: "Laporan Berhasil Disimpan",
                            icon: "success",
                            button: "simpan",
                        });
                        $('#form-add-leader').trigger("reset");
                        $('#modalLeader1').modal('hide');
                        $("span").remove('#error')
                        window.location = "{{route('maintenance.index')}}"
                    }else{
                        console.log('gagal');
                    }
                },
                error: function(err){
                    $.each(err.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<small class="text-strong text-danger" id="error">Mohon Isi</small>')
                        })
                        setTimeout(() => {
                            $('small#error').remove();
                        }, 5000);
                }
            });
        })
  });
</script>
@endpush