@if (session()->has('success'))
<div class="notif-updated">
    <strong class="fs-4">Yeah!! <i class='bx bx-check-circle fs-4'></i></strong>
<br>
    {{session('success')}}
</div>
@endif

{{-- <div class="notif-updated">
    <strong class="fs-4">Yeah!! <i class='bx bx-check-circle fs-4'></i></strong>
<br>
    success
</div> --}}