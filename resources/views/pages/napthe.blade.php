@extends('layout')
@section('content')

    <!-- MainContent -->
    <div class="main-content">
        <div class="container">
           
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-8" style="float:none;margin:0 auto;">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{route('nap-the-cao')}}">
                        @csrf
                        <div class="form-group">
                            <label>Loại thẻ:</label>
                            <select class="form-control" name="telco">
                                <option value="">Chọn loại thẻ</option>
                                <option value="VIETTEL">Viettel</option>
                                <option value="VIETTELAUTO">Viettel Auto</option>
                                <option value="MOBIFONE">Mobifone</option>
                                <option value="MOBIFONEAUTO">Mobifone Auto</option>
                                <option value="VINAPHONE">Vinaphone</option>
                                <option value="VINAPHONEAUTO">Vinaphone Auto</option>
                                <option value="GATE">Gate</option>
                                <option value="ZING">Zing</option>
                                <option value="MEGACARD">Megacard</option>
                                <option value="BIT">BIT</option>
                                <option value="GARENA">Garena</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mệnh giá:</label>
                            <select class="form-control" name="amount">
                                <option value="">Chọn mệnh giá</option>
                                <option value="10000">10.000</option>
                                <option value="20000">20.000</option>
                                <option value="30000">30.000</option>
                                <option value="50000">50.000</option>
                                <option value="100000">100.000</option>
                                <option value="200000">200.000</option>
                                <option value="300000">300.000</option>
                                <option value="500000">500.000</option>
                                <option value="1000000">1.000.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số seri:</label>
                            <input type="text" class="form-control" name="serial"/>
                        </div>
                        <div class="form-group">
                            <label>Mã thẻ:</label>
                            <input type="text" class="form-control" name="code"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="submit">NẠP NGAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
@endsection
