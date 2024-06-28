<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pasar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100">
    <div class="flex min-h-screen">
        @include('sidebar.bar')
      <!-- Main content -->
      <main class="flex-1 p-6">
        @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ session::get('success') }}
            </div>
        </div>
        @endif

       <!-- START FORM -->
       @if ($errors->any())
       <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
       </div>
       @endif
       <form action='{{url('ManagemenPasar')}}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id' id="id">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Nama Pasar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama' id="Nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">id_Wilayah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='Id_wilayah' id="Id_wilayah">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-white rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Id</th>
                            <th class="col-md-4">Nama Wilayah</th>
                            <th class="col-md-2">Id_wilayah</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->id_wilayah}}</td>
                            <td>
                                <a href='{{url('ManagemenPasar/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('yakin menghapus data?')" action="{{url('ManagemenPasar/'.$item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button></form>
                                <?php $i++; ?>
                        @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
               {{ $data->links() }}
          </div>
          <!-- AKHIR DATA -->
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
