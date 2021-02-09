@extends('layout.index')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ຂ່າວສານ</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">ໜ້າແລກ</a></li>
            <li class="breadcrumb-item active">ຂ່າວສານ</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">ເພີ່ມໃໝ່</h4>
            </div>

            @if(count($errors)>0)
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-ban"> ມີບັນຫາ</i></br>
                  @foreach($errors->all() as $error)
                  {{$error}} </br>
                  @endforeach
                </div>
              </div>
            @endif 

            <form method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">ຮູບພາບ</label>
                                <input type="file" class="form-control" name="image">
                              </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">ຫົວເລື່ອງ</label>
                                <input type="text" class="form-control" name="title" placeholder="ຫົວເລື່ອງ">
                              </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shortdes">ເນື້ອໃນສັ້ນ</label>
                                <input type="text" class="form-control" name="shortdes" placeholder="ເນື້ອໃນສັ້ນ">
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                              <div class="card-header">
                                <h3 class="card-title">
                                  ເນື້ອໃນຂ່າວສານ
                                </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <textarea id="summernote" name="des"></textarea>
                              </div>
                            </div>
                          </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ບັນທຶກ</button>
                    <a class="btn btn-warning" href="{{route('news.index')}}" >ກັບຄືນ</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection