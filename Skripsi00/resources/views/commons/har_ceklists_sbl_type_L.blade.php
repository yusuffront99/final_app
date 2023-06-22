@if ($data_id->status_sbl1 == 'L-1')
<div class="badge bg-danger">
<strong for="">L-1</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl1" id="status_sbl11" {{$data_id->status_sbl1 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="flexRadioDefault1">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl1" id="status_sbl1" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="L-1">
        <label class="form-check-label" for="flexRadioDefault2">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl2 == 'L-2')
<div class="badge bg-danger">
<strong for="">L-2</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl2" id="status_sbl2" {{$data_id->status_sbl2 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl2">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl2" id="status_sbl2" {{$data_id->status_sbl2 == 'L-2' ? 'checked' : ''}} value="L-2">
        <label class="form-check-label" for="status_sbl2">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl3 == 'L-3')
<div class="badge bg-danger">
<strong for="">L-3</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl3" id="status_sbl3" {{$data_id->status_sbl3 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl3">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl3" id="status_sbl3" {{$data_id->status_sbl3 == 'L-3' ? 'checked' : ''}} value="L-3">
        <label class="form-check-label" for="status_sbl3">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl4 == 'L-4')
<div class="badge bg-danger">
<strong for="">L-4</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl4" id="status_sbl4" {{$data_id->status_sbl4 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl4">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl4" id="status_sbl4" {{$data_id->status_sbl4 == 'L-4' ? 'checked' : ''}} value="L-4">
        <label class="form-check-label" for="status_sbl4">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl5 == 'L-5')
<div class="badge bg-danger">
<strong for="">L-5</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl5" id="status_sbl5" {{$data_id->status_sbl5 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl5">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl5" id="status_sbl5" {{$data_id->status_sbl5 == 'L-5' ? 'checked' : ''}} value="L-5">
        <label class="form-check-label" for="status_sbl5">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl6 == 'L-6')
<div class="badge bg-danger">
<strong for="">L-6</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl6" id="status_sbl6" {{$data_id->status_sbl6 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl6">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl6" id="status_sbl6" {{$data_id->status_sbl6 == 'L-6' ? 'checked' : ''}} value="L-6">
        <label class="form-check-label" for="status_sbl6">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl7 == 'L-7')
<div class="badge bg-danger">
<strong for="">L-7</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl7" id="status_sbl7" {{$data_id->status_sbl7 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl7">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl7" id="status_sbl7" {{$data_id->status_sbl7 == 'L-7' ? 'checked' : ''}} value="L-7">
        <label class="form-check-label" for="status_sbl7">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl8 == 'L-8')
<div class="badge bg-danger">
<strong for="">L-8</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl8" id="status_sbl8" {{$data_id->status_sbl8 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl8">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl8" id="status_sbl8" {{$data_id->status_sbl8 == 'L-8' ? 'checked' : ''}} value="L-8">
        <label class="form-check-label" for="status_sbl8">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl9 == 'L-9')
<div class="badge bg-danger">
<strong for="">L-9</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl9" id="status_sbl9" {{$data_id->status_sbl9 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl9">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl9" id="status_sbl9" {{$data_id->status_sbl9 == 'L-9' ? 'checked' : ''}} value="L-9">
        <label class="form-check-label" for="status_sbl9">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl10 == 'L-10')
<div class="badge bg-danger">
<strong for="">L-10</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl10" id="status_sbl10" {{$data_id->status_sbl10 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl10">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl10" id="status_sbl10" {{$data_id->status_sbl10 == 'L-10' ? 'checked' : ''}} value="L-10">
        <label class="form-check-label" for="status_sbl10">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl11 == 'L-11')
<div class="badge bg-danger">
<strong for="">L-11</strong><hr>
    <div class="" style="font-size:8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl11" id="status_sbl11" {{$data_id->status_sbl11 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl11">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl11" id="status_sbl11" {{$data_id->status_sbl11 == 'L-11' ? 'checked' : ''}} value="L-11">
        <label class="form-check-label" for="status_sbl11">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl12 == 'L-12')
<div class="badge bg-danger">
<strong for="">L-12</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl12" id="status_sbl12" {{$data_id->status_sbl12 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl12">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl12" id="status_sbl12" {{$data_id->status_sbl12 == 'L-12' ? 'checked' : ''}} value="L-12">
        <label class="form-check-label" for="status_sbl12">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl13 == 'L-13')
<div class="badge bg-danger">
<strong for="">L-13</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl13" id="status_sbl13" {{$data_id->status_sbl13 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl13">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl13" id="status_sbl13" {{$data_id->status_sbl13 == 'L-13' ? 'checked' : ''}} value="L-13">
        <label class="form-check-label" for="status_sbl13">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

<hr>

@if ($data_id->status_sbl14 == 'L-14')
<div class="badge bg-danger">
<strong for="">L-14</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl14" id="status_sbl14" {{$data_id->status_sbl14 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl14">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl14" id="status_sbl14" {{$data_id->status_sbl14 == 'L-14' ? 'checked' : ''}} value="L-14">
        <label class="form-check-label" for="status_sbl14">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl15 == 'L-15')
<div class="badge bg-danger">
<strong for="">L-15</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl15" id="status_sbl15" {{$data_id->status_sbl15 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl15">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl15" id="status_sbl15" {{$data_id->status_sbl15 == 'L-15' ? 'checked' : ''}} value="L-15">
        <label class="form-check-label" for="status_sbl15">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl16 == 'L-16')
<div class="badge bg-danger">
<strong for="">L-16</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl16" id="status_sbl16" {{$data_id->status_sbl16 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl16">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl16" id="status_sbl16" {{$data_id->status_sbl16 == 'L-16' ? 'checked' : ''}} value="L-16">
        <label class="form-check-label" for="status_sbl16">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl17 == 'L-17')
<div class="badge bg-danger">
<strong for="">L-17</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl17" id="status_sbl17" {{$data_id->status_sbl17 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl17">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl17" id="status_sbl17" {{$data_id->status_sbl17 == 'L-17' ? 'checked' : ''}} value="L-17">
        <label class="form-check-label" for="status_sbl17">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl18 == 'L-18')
<div class="badge bg-danger">
<strong for="">L-18</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl18" id="status_sbl18" {{$data_id->status_sbl18 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl18">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl18" id="status_sbl18" {{$data_id->status_sbl18 == 'L-18' ? 'checked' : ''}} value="L-18">
        <label class="form-check-label" for="status_sbl18">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl19 == 'L-19')
<div class="badge bg-danger">
<strong for="">L-19</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl19" id="status_sbl19" {{$data_id->status_sbl19 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl19">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl19" id="status_sbl19" {{$data_id->status_sbl19 == 'L-19' ? 'checked' : ''}} value="L-19">
        <label class="form-check-label" for="status_sbl19">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl20 == 'L-20')
<div class="badge bg-danger">
<strong for="">L-20</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl20" id="status_sbl20" {{$data_id->status_sbl20 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl20">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl20" id="status_sbl20" {{$data_id->status_sbl20 == 'L-20' ? 'checked' : ''}} value="L-20">
        <label class="form-check-label" for="status_sbl20">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl21 == 'L-21')
<div class="badge bg-danger">
<strong for="">L-21</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl21" id="status_sbl21" {{$data_id->status_sbl21 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl21">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl21" id="status_sbl21" {{$data_id->status_sbl21 == 'L-21' ? 'checked' : ''}} value="L-21">
        <label class="form-check-label" for="status_sbl21">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif

@if ($data_id->status_sbl22 == 'L-22')
<div class="badge bg-danger">
<strong for="">L-22</strong><hr>
    <div class="" style="font-size: 8px;">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl22" id="status_sbl22" {{$data_id->status_sbl22 == NULL ? 'checked' : ''}} value=''>
        <label class="form-check-label" for="status_sbl22">
            Normal
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="status_sbl22" id="status_sbl22" {{$data_id->status_sbl22 == 'L-22' ? 'checked' : ''}} value="L-22">
        <label class="form-check-label" for="status_sbl22">
            Abnormal
        </label>
        </div>
    </div>
</div>
@endif