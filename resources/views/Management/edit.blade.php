<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pasar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
    
        <form action='{{url('ManagemenPasar/'.$data->id)}}' method='post'>
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="{{url('ManagemenPasar')}}" class="btn btn-secondary">kembali</a>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">Id</label>
                    <div class="col-sm-10">
                        {{$data->id}}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">Nama Pasar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='Nama' value="{{$data->nama}}" id="Nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">id_Wilayah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='Id_wilayah' value="{{$data->id_wilayah}}" id="Id_wilayah">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
              </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>