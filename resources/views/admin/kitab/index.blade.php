@extends('layouts.main')

@section('content')
    <div class="row el-element-overlay">
        @foreach ($kitab as $item)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1">
                            <img src="{{ asset('template/adminLite') }}/assets/images/big/img1.jpg" alt="user" />
                            <div class="el-overlay">
                                <ul class="list-style-none el-info">
                                    <li class="el-item">
                                        <a class="btn default btn-outline el-link" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $item->id }}" href="#">
                                            <i class="mdi mdi-grease-pencil"></i>
                                        </a>
                                    </li>
                                    <li class="el-item">
                                        <a class="btn default btn-outline el-link deleted" href="#"
                                            data-id="{{ $item->id }}" data-nama="{{ $item->nama_kitab }}">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content">
                            <h4>{{ $item->nama_kitab }}</h4>
                            <span class="text-muted">subtitle of project</span>
                        </div>
                        <a href="#" class="btn btn-info btn-sm float-end" style="margin-right: 10px"
                            data-bs-toggle="modal" data-bs-target="#modalBab{{ $item->id }}">Tambah Bab</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="">
        <a href="#" class="btn-circle btn-lg btn-cyan float-end text-white" data-bs-toggle="modal"
            data-bs-target="#exampleModal" style="position: fixed; bottom: 30px; right: 30px;">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>
    <!-- Modal Tambah Kitab -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kitab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.kitab') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                    Nama Kitab
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_kitab"
                                        placeholder="Masukkan nama kitab" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($kitab as $item)
        <!-- Modal Edit Kitab -->
        <!-- Modal -->
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kitab</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update.kitab', $item->id) }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                        Nama Kitab
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_kitab"
                                            value="{{ $item->nama_kitab }}" placeholder="Masukkan nama kitab" />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Bab -->
        <!-- Modal -->
        {{-- <div class="modal fade" id="modalBab{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Bab Kitab {{ $item->nama_kitab }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('store.bab') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                        Nama Kitab
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kitab_id"
                                            placeholder="Masukkan nama kitab" value="{{ $item->nama_kitab }}" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                        Bab
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="bab"
                                            placeholder="Masukkan Bab" value="" />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> --}}
    @endforeach
    <!-- Modal Tambah Bab -->
    @foreach ($kitab as $item)
        <!-- Modal -->
        <div class="modal fade" id="modalBab{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Bab Kitab {{ $item->nama_kitab }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('store.bab') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                        Nama Kitab
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kitab_id"
                                            placeholder="Masukkan nama kitab" value="{{ $item->nama_kitab }}" disabled />
                                        <input type="hidden" name="kitab_id" value="{{ $item->id }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                        Bab
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="bab"
                                            placeholder="Masukkan Bab" value="{{ old('bab') }}" />
                                        @error('bab')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('footer')

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                showToastr("{{ $error }}", "error");
            @endforeach
        </script>
    @endif

    @if (session('success'))
        <script>
            showToastr("{{ session('success') }}", "success");
        </script>
    @endif

    @if (session('error'))
        <script>
            showToastr("{{ session('error') }}", "error");
        </script>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.deleted').click(function() {
            var idkitab = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Kamu Yakin Menghapus Kitab " + nama + " !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus/kitab/" + idkitab + ""
                    Swal.fire(
                        'Deleted!',
                        'Data Berhasil Dihapus.',
                        'success',
                    )
                }
            })
        });
    </script>

@stop
