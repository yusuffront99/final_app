<div class="mb-1">
        <div class="row">
            <strong class="col-6 bg-danger text-center text-danger fw-bold ">
                <div class="badge bg-danger rounded text-white mt-3">Burner System</div>
            </strong>
            <div class="col-6 border border-danger text-dark fw-bold">
                Total Records
                <br>
                <span class="badge bg-danger text-white rounded mb-2">{{$total_burner_e}}</span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-2 text-warning">
                Wait Approval
                <br>
                <div class="badge bg-warning mb-1">
                    {{$tot_wa_burner_e}}
                </div>
            </div>
            <div class="col-2 text-primary">
                Forwarding
                <br>
                <div class="badge bg-primary mb-1">
                    {{$tot_fw_burner_e}}
                </div>
            </div>
            <div class="col-2 text-danger">
                Rejected
                <br>
                <div class="badge bg-danger mb-1">{{$tot_rj_burner_e}}</div>
            </div>
            <div class="col-2" style="color: #D876D8;">
                Wait Material
                <br>
                <div class="badge mb-1" style="background-color: #D876D8;">{{$tot_wm_burner_e}}</div>
            </div>
            <div class="col-2">
                Working
                <br>
                <div class="badge bg-dark mb-1">{{$tot_wo_burner_e}}</div>
            </div>
            <div class="col-2 text-success">
                Resolved
                <br>
                <div class="badge bg-success mb-1">{{$tot_rs_burner_e}}</div>
            </div>
        </div>
</div>