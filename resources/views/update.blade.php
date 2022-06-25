{{-- <div class="p2">
    <div class="form-group mb-3">
        <input type="text" name="tanggal" id="tanggal" class="form-control "placeholder="tanggal" required value="{{ $Surats->judul }}" autocomplete="off">
    </div>
    <div class="form-group mb-3">
        <input type="text" name="judul" id="judul" class="form-control "placeholder="judul..." required value="{{ $Surats->judul }}" autocomplete="off">
    </div>

    <div class="form-group mt-5">
    <button class="btn btn-primary" onclick="update({{ $Books->id }})">Update Surat</button>
    </div>
</div> --}}


<div class="p2">
    <div class="form-group mb-3">
        <input type="number" name="nosurat" id="nosurat" class="form-control " placeholder="No surat..." required value="{{ $Surat->nosurat }}" autocomplete="off">
    </div>
    <div class="form-group mb-3">
        <input type="text" name="judul" id="judul" class="form-control " placeholder="Judul..." required value="{{ $Surat->judul }}" autocomplete="off">
    </div>
    <div class="form-group mb-3">
        <input type="date" name="tanggal" id="tanggal" class="form-control "placeholder="Tanggal Surat..." required value="{{ $Surat->tanggal }}" autocomplete="off">
    </div>

    <div class="form-group mt-5">
        <button class="btn btn-primary" onclick="update({{ $Surat->id }})">Update Surat</button>
        </div>
    </div>