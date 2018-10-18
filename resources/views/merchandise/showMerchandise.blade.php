<!-- 檔案目錄：resources/views/merchandise/showMerchandise.blade.php -->

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
                        <th>name</th>
                        <td>{{ $Merchandise->name }}</td>
                    </tr>
                    <tr>
                        <th>photo</th>
                        <td>
                            <img src="{{ isset($Merchandise->photo) ? $Merchandise->photo : '/assets/images/default-merchandise.png' }}" />
                        </td>
                    </tr>
                    <tr>
                        <th>price</th>
                        <td>
                            {{ $Merchandise->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>remain-count</th>
                        <td>
                            {{ $Merchandise->remain_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>introduction</th>
                        <td>
                            {{ $Merchandise->introduction }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form action="/merchandise/{{ $Merchandise->id }}/buy"
                                  method="post"
                            >
                                buy-count
                                <select name="buy_count">
                                    @for($count = 0; $count <= $Merchandise->remain_count; $count++)
                                        <option value="{{ $count }}">{{ $count }}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-info">
                                    buy
                                </button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
