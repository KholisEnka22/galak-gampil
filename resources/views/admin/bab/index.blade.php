@extends('layouts.main')

@section('content')
    <div class="row">
        @php
            $index = 0;
        @endphp
        @foreach ($kitab as $item)
            @php
                $tableId = 'zero_config_' . $index;
                $index++;
            @endphp
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> Kitab {{ $item->nama_kitab }}</h3>
                        <div class="table-responsive">
                            <table id="{{ $tableId }}" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="20">No</th>
                                        <th>Bab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->bab as $no => $b)
                                        <tr>
                                            <th scope="row">{{ ++$no }}</th>
                                            <td>Bab {{ $b->bab }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @endforeach
    </div>
@endsection

@section('footer')
    <script>
        @php
            $index = 0;
        @endphp
        @foreach ($kitab as $item)
            $('#zero_config_{{ $index }}').DataTable();
            @php
                $index++;
            @endphp
        @endforeach
    </script>
@endsection
