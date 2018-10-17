<!-- 檔案目錄：resources/views/merchandise/manageMerchandise.blade.php -->

<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>photo</th>
                        <th>status-name</th>
                        <th>price</th>
                        <th>remain-count</th>
                        <th>edit</th>
                    </tr>
                    @foreach($MerchandisePaginate as $Merchandise)
                        <tr>
                            <td> {{ $Merchandise->id }}</td>
                            <td> {{ $Merchandise->name }}</td>
                            <td>
                                <img src="{{ isset($Merchandise->photo) ? $Merchandise->photo : '/assets/images/default-merchandise.png' }}" width=100/>
                            </td>
                            <td>
                                @if($Merchandise->status == 'C')
                                    <span class="label label-default">
                                        create
                                    </span>
                                @else
                                    <span class="label label-success">
                                        sell
                                    </span>
                                @endif
                            </td>
                            <td> {{ $Merchandise->price }}</td>
                            <td> {{ $Merchandise->remain_count }}</td>
                            <td>
                                <a href="/merchandise/{{ $Merchandise->id }}/edit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {{-- 分頁頁數按鈕 --}}
                {{ $MerchandisePaginate->links() }}
            </div>
        </div>
    </div>
@endsection
