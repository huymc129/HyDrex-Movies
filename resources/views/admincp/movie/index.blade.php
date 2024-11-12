@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <p></p>
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
                <p></p>
                <table class="table table-responsive" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Thuộc gói phim</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Thời lượng phim</th> 
                            <th scope="col">Image</th>
                            <th scope="col">Hot</th>
                            <th scope="col">Resolution</th>
                            <th scope="col">Sub</th>
                            {{-- <th scope="col">Description</th> --}}
                            {{-- <th scope="col">Slug</th> --}}
                            <th scope="col">Active</th>
                            <th scope="col">Category</th>
                            <th scope="col">Thuộc phim</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Country</th>
                            <th scope="col">Số tập</th>
                            {{-- <th scope="col">Ngày tạo</th> --}}
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Năm</th>
                            <th scope="col">Season</th>
                            

                            <th scope="col">Manage</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->customer_package->title }}</td>
                                <td>{{ $cate->tags }}</td>
                                <td>{{ $cate->thoiluong }}</td>
                                <td><img width="60%" src="{{asset('uploads/movie/'.$cate->image)}}"></td>
                                <td>
                                    @if ($cate->phim_hot == 0)
                                        Không
                                    @else
                                        Có
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->resolution == 0)
                                        HD
                                    @elseif ($cate->resolution == 1)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->sub == 0)
                                        Phụ Đề
                                    @else
                                        Thuyết Minh
                                    @endif
                                </td>
                                {{-- <td>{{ $cate->description }}</td> --}}
                                {{-- <td>{{ $cate->slug }}</td> --}}
                                <td>
                                    @if ($cate->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>{{ $cate->category->title }}</td>
                                    <td>
                                        @if($cate->thuocphim == 'phimle')
                                            Phim lẻ
                                        @else
                                            Phim bộ
                                        @endif
                                    </td>
                                
                                    <td>
                                        @foreach($cate->movie_genre as $gen)
                                        
                                        <span class="badge text-bg-success">{{ $gen->title }}</span>
                                        @endforeach
                                    </td>
                                    
                                
                                <td>{{ $cate->country->title }}</td>
                                <td>{{ $cate->sotap }}</td>
                                {{-- <td>{{ $cate->ngaytao}}</td> --}}
                                <td>{{ $cate->ngaycapnhat }}</td>
                                <td>
                                    @csrf
                                    {!! Form::selectYear('year',2010,2023,isset($cate->year) ? $cate->year : '',['class'=>'select-year','id'=>$cate->id]) !!}
                                </td>
                                <td>
                                    @csrf
                                    {!! Form::selectRange('season',0,10,isset($cate->season) ? $cate->season : '',['class'=>'select-season','id'=>$cate->id]) !!}
                                </td>
                                
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['movie.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Bạn có muốn xóa ?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
