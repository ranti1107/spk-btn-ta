@extends('Karyawan.template.base')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">


@endpush
@section('content')

<h4 class="fw-bold py-3 mb-4">Nasabah Pemohon</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                  <h5 class="card-header">Data Nasabah Pemohon</h5>
                <div class="row">
                    <a href="{{url('Karyawan/nasabah/create')}}">
                      <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i class="bx bx-plus"></i> Tambah Nasabah</div>
                    </a>
                  </div>
                <div class="container">
                  <div class="table-responsive">
                    <table id="table" class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Nasabah Pemohon</th>
                          <th>Tanggal Lahir</th>
                          <th>Alamat </th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($list_nasabah as $nasabah)
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong></td>
                          <td>{{$nasabah->nama}}</td>
                          <td>{{$nasabah->ttl}}</td>
                          <td>{{$nasabah->alamat}}</td>
                          <td>
                              <div class="row">
                                <div class="btn-group">
                                  <a href="{{url('Karyawan/nasabah/detail', $nasabah->id)}}">
                                    <button class="btn btn-info" style="margin-right: 5px"><i class="bx bx-info-circle"></i></button>
                                  </a>
                                  <a href="{{url('Karyawan/nasabah/edit', $nasabah->id)}}">
                                    <button class="btn btn-warning" style="margin-right: 5px"><i class="bx bx-edit-alt"></i></button>
                                  </a>
                                  <form action="{{url('Karyawan/nasabah', $nasabah->id)}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger"><i class="bx bx-trash"></i></button>
                                  </form>
                                </div>
                              </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />

@endsection
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
    var table = $('#table').DataTable( {
        lengthChange: false,
        stateSave: true,
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

</script>
@endpush