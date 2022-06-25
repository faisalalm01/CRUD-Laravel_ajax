<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Persuratan</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    body{
        background-attachment: fixed;
        background-color: rgb(216, 216, 225)
    }
</style>
<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
		<div class="container">
			<a class="navbar-brand" href="/">UAS PEMWEB</a>
				<a class="mr-sm-2 mt-2" href="https://github.com/faisalalm01/CRUD-Laravel_ajax"><box-icon name='github' type='logo' color='#ffffff' ></box-icon></a>
		</div>
		</nav>
    <div id="app" class="container mt-4 card">
        {{-- @include('create'); --}}
        

              <div id="test">
                  
            </div>
    
      
          <hr>
          <div class="row">
              <h2>Data Surat Keluar</h2>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Search : </span>
                      </div>
                      <input v-model="search" v-on:keyup.enter="onSearch()" type="text" class="form-control"
                          placeholder="Enter search by name ..." />
                  </div>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-dark w-100" type="button"  onclick="create()">
                      + Add New
                  </button>
              </div>
          
          <div id="read">
          </div>
          </div>
  <!-- Modal add/update -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Tittle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div id="page" class="p-2">

                </div>
        </div>
      </div>
    </div>
  </div>



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/jquery.js"></script>
<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
<script>
$(document).ready(function(){
read();
});
  //membaca data kendaraan
  function read(){
    $.get("{{url('read')}}",{}, function(data,status){
        $("#read").html(data);
    })
  }
// menampilkan halaman modal add
function create(){
        $.get("{{url('create')}}",{}, function(data,status){
            $("#test").html(data)
            $(".card-title").html('Tambah Data Surat');
        });
    }
// menampilkan halaman modal update
function show(id){
        $.get("{{url('show')}}/"+id,{}, function(data,status){
            $("#exampleModalLabel").html('Update Data Surat')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
// proses add data
function store(){
        var tanggal = $("#tanggal").val();
        var judul = $("#judul").val();
        var nosurat = $("#nosurat").val();
        $.ajax({
            type:"get",
            url:"{{ url('store') }}",
            data:{tanggal,judul,nosurat},
            success:function(data){
                $(".btn-close").click();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Surat Berhasil',
                    text: 'Ditambahkan'});
                read();
            }
        });
    }
// proses Update data
function update(id){
    var tanggal = $("#tanggal").val();
        var judul = $("#judul").val();
        var nosurat = $("#nosurat").val();
        $.ajax({
            type:"get", 
            url:"{{ url('update') }}/"+id,
            data:{tanggal,judul,nosurat},
            success:function(data){
                $(".btn-close").click();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Surat Berhasil',
                    text: 'Diupdate'});
                read();
            }
        });
    }
// proses destroy/hapus data
function destroy(id){
    Swal.fire({
  title: 'Apakah Kamu Yakin ? ',
  text: "Menghapus Data Surat ini ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya'
}).then((result) => {
  if (result.isConfirmed) {
   $.ajax({
            type:"get",
            url:"{{ url('destroy') }}/"+id,
            success:function(data){
                read();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Surat Berhasil',
                    text: 'Dihapus'});
            }
        });
  }
})
    }
</script>
</body>
</html>