@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/visi-misi-tujuan/' . Crypt::encryptString($visiMisiTujuan->idVisiMisiTujuan)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Visi, Misi dan Tujuan</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">Visi*</label><br>
                    <input type="hidden" id="visi" name="visi" value="{{ old('visi', $visiMisiTujuan->visi) }}">
                    <trix-editor input="visi" class="@error('visi') border border-danger @enderror">
                    </trix-editor>
                    @error('visi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Misi*</label><br>
                    <input type="hidden" id="misi" name="misi"
                        value="{{ old('misi', $visiMisiTujuan->misi) }}">
                    <trix-editor input="misi" class="@error('misi') border border-danger @enderror">
                    </trix-editor>
                    @error('misi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Tujuan*</label><br>
                    <input type="hidden" id="tujuan" name="tujuan"
                        value="{{ old('tujuan', $visiMisiTujuan->tujuan) }}">
                    <trix-editor input="tujuan" class="@error('tujuan') border border-danger @enderror">
                    </trix-editor>
                    @error('tujuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save pr-1"></i>
                    Simpan
                </button>
            </div>
        </div>
    </form>
@endsection
