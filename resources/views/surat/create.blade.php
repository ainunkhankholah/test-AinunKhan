@extends('layouts.cui')

@section('content')
    <div class="card mb-4">
        <div class="card-header"> Surat </div>
        <div class="card-body">
            <form method="post" action="{{ route('surat.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="no_surat" class="form-label">No Surat</label>
                    <input placeholder="no_surat" id="no_surat" type="text" class="form-control @error('content') is-invalid @enderror" name="no_surat" value="{{ old('no_surat') }}" required autofocus>
                    <label for="judul_surat" class="form-label">Judul Surat</label>
                    <input placeholder="Judul Surat" id="judul_surat" type="text" class="form-control @error('content') is-invalid @enderror" name="judul_surat" value="{{ old('judul_surat') }}" required autofocus>
                    <label for="isi">Isi</label>
                    <textarea class="form-control" name="isi" id="isi" cols="20" rows="5"></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
