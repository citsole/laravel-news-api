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
              <h4 class="card-title">ລຶບຂໍ້ມູນ</h4>
            </div>
            <form method="POST" action="{{route('news.destroy', $news->id)}}">
                @csrf
                @method('DELETE')
                
                <div class="card-body">
                    <p>ທ່ານຕ້ອງການລຶບຂໍ້ມູນ <b>{{$news->title}}</b>  ຫຼື ບໍ?</p>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">ລຶບຂໍ້ມູນ</button>
                    <a class="btn btn-warning" href="{{route('news.index')}}" >ກັບຄືນ</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection