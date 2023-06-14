<div class="d-flex justify-content-between mb-3">
    @if (Auth::user()->jabatan != 'Supervisor Operasi' )
        <div>
            <a href="{{route('burner_system.index')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
        </div>
        <div>
            <a href="" class="btn btn-sm btn-success"><i class='bx bx-printer'></i> Print</a>
        </div>
    @else
        <div>
            <a href="{{route('lmasuk.op.burner')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
        </div>
    @endif
</div>