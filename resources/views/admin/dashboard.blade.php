@extends('layouts.master')

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Data Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('partials.alert-success')
                <table class="table">
                    <thead>
                        <th>
                            Username
                        </th>
                        <th>
                            Camp
                        </th>
                        <th>
                            Register Data
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Status Payment
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $item)
                            <tr class="align-middle">
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    {{ $item->camp->title }}
                                </td>
                                <td>{{ $item->created_at->format('M d, Y') }}</td>
                                <td>
                                    ${{ $item->camp->price }}
                                </td>
                                <td>
                                    @if ($item->is_paid)
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning">Waiting</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$item->is_paid)
                                        <form action="{{ route('admin.checkout.update', $item) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Set to paid</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="align-middle">
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection