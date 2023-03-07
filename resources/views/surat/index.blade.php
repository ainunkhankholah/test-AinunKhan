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
            <a href="{{ route('surat.create') }}" class="btn btn-primary mb-3"><span class="cil-note-add icon"></span> Surat </a>
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
                            <td class="text-center"><form action="{{ route('surat.destroy',$sr->id) }}" method="POST">
                                <a class="btn  btn-warning" href="{{route('surat.edit', $sr->id)}} ">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('apakah anda yakin ingin menghapus Surat {{ $sr->no_surat}} ?')"  class="btn btn-danger"><span class="cil-trash icon"></span></button>
                                </form>
                            </td>                 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $surat->links() }}
        </div>
    </div>
@endsection
