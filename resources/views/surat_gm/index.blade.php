@extends('layouts.cui')

@section('content')
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    

    <div class="card mb-4">
        <div class="card-header"> Surat </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Surat</th>
                        <th scope="col">Judul Surat</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surat as $index => $sr)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $sr->no_surat }}</td>
                            <td>{{ $sr->judul_surat }}</td>
                            <td>{{ $sr->isi }}</td>                            
                            <td>
                                @switch(strtolower($sr->status))
                                    @case('tolak')
                                        <span class="badge text-bg-danger">ditolak</span>
                                        @break
                                    @case('setuju')
                                        <span class="badge text-bg-success">setuju</span>
                                        @break
                                    @default
                                        <span class="badge text-bg-warning">menunggu</span>
                                @endswitch
                            </td>
                            <td class="text-center">
                                @if ($sr->status == "")
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $sr->id }}">
                                        Action
                                    </button>
                                @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $sr->id }}">
                                        Action
                                    </button>
                                @endif
                            </td>                
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $sr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Action</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="PUT" action="{{ route('surat.status') }}">
                                        <input type="hidden" name="idSurat" value={{ $sr->id }}>
                                        {{-- <input type="" name="idKontrak" value={{ $pw->id }}> --}}
                                        <label for="statusSurat">Status</label>
                                        <select class="form-select mb-2" name="statusSurat" id="statusSurat" value="setuju" required>
                                            <option value="">Pilih Status</option>
                                            @if ($sr->status == 'SETUJU')
                                                <option value="setuju" selected>Setuju</option>
                                                <option value="tolak">Tolak</option>
                                            @elseif ($sr->status == 'TOLAK')
                                                <option value="setuju">Setuju</option>
                                                <option value="tolak" selected>Tolak</option>
                                            @else
                                                <option value="setuju">Setuju</option>
                                                <option value="tolak">Tolak</option>
                                            @endif
                                        </select>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" style="width: 15%; text-align:right; background-color: transparent; color:#4971FF; border:none;" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            {{ $surat->links() }}
        </div>
    </div>
@endsection
