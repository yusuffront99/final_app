<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 badge bg-primary" id="exampleModalLabel">EQUIPMENT REPAIR FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="m-2">
            <form action="">
                <div class="form-group mb-2 fw-bold">
                    <label for="">Kode Perbaikan</label>
                    <select name="repair_code" id="repair_code" class="form-select">
                        <option value="" selected disabled>-- Kode Perbaikan --</option>
                        @foreach ($data_burner_resolved as $cd)
                            <option value="{{$cd->id}}" class="fw-bold text-danger"><?php echo substr($cd->id, 0, 8)?></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2 fw-bold">
                    <label for="">Kategori</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">BURNER SYSTEM</option>
                    </select>
                </div>
                <div class="row">
                  <label for="" class="fw-bold">Spare Part Item</label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                        <select name="spare_part_item" id="spare_part_item" class="form-select">
                            <option value="">Tabung Regulator</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2 fw-bold">
                        <select name="spare_part_item" id="spare_part_item" class="form-select">
                            <option value="">Tabung Regulator</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2 fw-bold">
                        <select name="spare_part_item" id="spare_part_item" class="form-select">
                            <option value="">Tabung Regulator</option>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label for="" class="fw-bold">Harga Item (Rupiah)</label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_price" id="item_price" class="form-control" value="0">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_price" id="item_price" class="form-control" value="0">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_price" id="item_price" class="form-control" value="0">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label for="" class="fw-bold">Total Item (Jumlah)</label>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_total" id="item_total" class="form-control" value="1">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_total" id="item_total" class="form-control" value="1">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <input type="text" name="item_total" id="item_total" class="form-control" value="1">
                    </div>
                  </div>
                </div>
                </div>
                
                <div class="form-group mb-2 fw-bold">
                    <label for="">Penanganan</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>