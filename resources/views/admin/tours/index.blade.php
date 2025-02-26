@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">List Tours</h3>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table table-responsive">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gallery</th>
                        <th scope="col">Lịch trình</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Giá tour</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Phương tiện</th>
                        <th scope="col">Mã tour</th>
                        <th scope="col">Image</th>
                        <th scope="col">Mô tả</th>
                        {{-- <th scope="col">Slug tour</th> --}}
                        <th scope="col">Ngày đi</th>
                        {{-- <th scope="col">Ngày về</th> --}}
                        <th scope="col">Nơi đi</th>
                        {{-- <th scope="col">Nơi đến</th> --}}
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tours as $key => $tour)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <th scope="row"><a href="{{ route('gallery.edit', [$tour->id]) }}">Thêm ảnh</a></th>
                            <th scope="row"><a href="{{ route('schedule.edit', [$tour->id]) }}">Thêm lịch trình</a></th>
                            <td>{{ $tour->title }}</td>
                            <td>{{ $tour->category->title }}</td>
                            <td>{{ number_format($tour->price, 0, ',', '.') }}vnd</td>
                            <td>{{ $tour->quantity }}</td>
                            <td>{{ $tour->vehicle }}</td>
                            <td>{{ $tour->tour_code }}</td>
                            <td><img height="120" width="120" src="{{ asset('uploads/tours/' . $tour->image) }}"></td>
                            <td>{{ $tour->description }}</td>
                            {{-- <td>{{ $tour->slug }}</td> --}}
                            <td>
                                @php
                                    // Convert the string into an array by splitting on commas
                                    $departureDates = explode(', ', $tour->departure_date);
                                @endphp

                                @if (!empty($departureDates))
                                    @foreach ($departureDates as $date)
                                        <span class="badge rounded-pill bg-primary">{{ $date }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No departure dates available</span>
                                @endif
                            </td>

                            {{-- <td>{{ $tour->return_date }}</td> --}}
                            <td>{{ $tour->tour_from }}</td>
                            {{-- <td>{{ $tour->tour_to }}</td> --}}

                            <td>{{ $tour->created_at }}</td>

                            <td>
                                @if ($tour->status == 1)
                                    <span class="text text-success">Active</span>
                                @else
                                    <span class="text text-success">Unactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tours.edit', [$tour->id]) }}" class="btn btn-warning">Edit</a>
                                <form onsubmit="return confirm('Bạn có muốn xóa không?');"
                                    action="{{ route('tours.destroy', [$tour->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Xóa">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection
