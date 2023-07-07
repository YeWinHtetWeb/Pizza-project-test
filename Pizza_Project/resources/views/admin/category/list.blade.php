@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Category List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('category#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        @if (count($categories) != 0)
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr class="tr-shadow">
                                            <td class="col-1">{{ $item->category_id }}</td>
                                            <td class="col-6">{{ $item->name }}</td>
                                            <td class="col-3">{{ $item->created_at->format('j-F-Y') }}</td>
                                            <td class="col-2">
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Seemore">
                                                        <i class="fa-solid fa-eye text-primary"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit text-success"></i>
                                                    </button>
                                                    <a href="{{ route('category#delete', $item->category_id) }}"
                                                        class="text-decoration-none">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete text-danger"></i>
                                                        </button>
                                                    </a>
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h3 class="text-secondary text-center" style="margin-top: 300px;">There is no Category name...
                            </h3>
                        @endif
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
@endsection
