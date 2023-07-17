<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 badge bg-primary" id="exampleModalLabel">EQUIPMENT REPAIR FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="m-2">
            <form action="" id="form-maintenance-hppump">
                <input type="hidden" name="user_id" id="user_id">
                <input type="hidden" name="damage_date" id="damage_date">
                <input type="hidden" name="repair_date" id="repair_date">
                <input type="hidden" name="unit" id="unit">
                
                <div class="form-group mb-2 fw-bold">
                    <div class="d-flex justify-content-start">
                    <div class="mx-1">
                      <label for="">Repair Code <i class='bx bx-info-circle text-warning' style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="right" title="KODE PERBAIKAN bisa dicek pada data Tabel EQUIPMENT REPAIR DATA"></i></label>
                      <input type="text" disabled id="code" class="form-control">
                    </div>
                    <div class="mx-1">
                      <label for="">Masukan Kode Disamping</label>
                      <input type="text" name="repair_code" id="repair_code" class="form-control" placeholder="Ex: 45e7xxxxx">
                    </div>
                    </div>
                </div>
        
                <div class="form-group mb-2 fw-bold">
                    <label for="">Kategori</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="HIGH PRESSURE PUMP">HIGH PRESSURE PUMP</option>
                    </select>
                </div>
                <div class="row">
                  <label for="" class="fw-bold">Spare Part Item <i class='bx bx-info-circle text-warning' style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Apabila Spare Part Item yang diganti hanya 1 item, maka item sebelahnya tidak perlu dipilih"></i></label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      
                        <select name="item_sp_1" id="item_sp_1" class="form-select" required>
                            <option value="-">-- Spare Part --</option>
                            @foreach ($spare_part as $sp)
                            <option value="{{$sp->spare_part_name}}">{{$sp->spare_part_name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2 fw-bold">
                        <select name="item_sp_2" id="item_sp_2" class="form-select">
                             <option value="-">-- Spare Part --</option>
                            @foreach ($spare_part as $sp)
                            <option value="{{$sp->spare_part_name}}">{{$sp->spare_part_name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2 fw-bold">
                        <select name="item_sp_3" id="item_sp_3" class="form-select">
                             <option value="-">-- Spare Part --</option>
                            @foreach ($spare_part as $sp)
                            <option value="{{$sp->spare_part_name}}">{{$sp->spare_part_name}}</option>
                            @endforeach
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

        // $('#repair-code').on('change', function() {
        //   var optionId = $(this).val();

        //   $.ajax({
        //         url: 'hppump/' + optionId,
        //         type: 'get',
        //         data: {},
        //         success:function(response){
        //           if(response.success == true){
        //                 $('#user_id').val(response.data.user_id);
        //             }
        //         }
        //     });
        // });

        $('#create-detail').click(function(){
            $('#form-maintenance-hppump').trigger("reset");
        })

        $('#save').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
                url: "{{route('maintenance-hppump.store')}}",
                method: 'POST',
                data: $('#form-maintenance-hppump').serialize(),
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
                        $("span").remove('#error');
                        window.location = "{{route('maintenance.index')}}"
                    }else{
                        console.log('gagal');
                    }
                },
                error: function(err){
                        $.each(err.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<small class="text-strong text-danger" id="error">'+error+'</small>')
                        })
                        setTimeout(() => {
                            $('small#error').remove();
                        }, 5000);
                    }
          });
        })


        $('body').on('click', '#create_detail', function () {
          var id = $(this).data('id');
          $.get('hppump/'+id+'/edit', function(data) {
              $('#exampleModal').modal('show');
              $('#code').val(data.id.slice(0,8));
              $('#user_id').val(data.user_id);
              $('#unit').val(data.unit);
              $('#damage_date').val((dayjs(data.tanggal_update).format('DD-MM-YYYY')));
              $('#repair_date').val((dayjs(data.updated_at).format('DD-MM-YYYY')));
        })
      });
  });
</script>
@endpush
