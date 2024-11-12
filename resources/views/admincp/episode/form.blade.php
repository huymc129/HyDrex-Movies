@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>
                    <div class="card-header">Quản lý tập phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
                        @endif
                        
                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn Phim', []) !!}
                            {!! Form::select('movie_id', ['0'=>'Chọn phim', 'phim'=> $list_movie], isset($episode) ? $episode->movie_id : '', [
                                'class' => 'form-control select-movie'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link Phim', []) !!}
                            {!! Form::text('link',  isset($episode) ? $episode->linkphim : '<iframe width="560" height="315" src=" nhét code dô đây " title="video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', [
                                'class' => 'form-control', 'placeholder'=>'Nhập vào dữ liệu...'
                            ]) !!}
                        </div>
                    
                        {{-- tap phim --}}
                        @if(isset($episode))
                            <div class="form-group">
                                {!! Form::text('link', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...']) !!}
                            </div>
                        @else
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                <select name="episode" class="form-control" id="show_movie"></select>    
                            </div>
                        @endif

                        @if (!isset($episode))
                            {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif



                        {!! Form::close() !!}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
   
@endsection
