<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My {{ Auth::user()->is_admin ? 'Data' : '' }} Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('partials.alert')
            @if (Auth::user()->is_admin)
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
            @else
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $item)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="/assets/images/item_bootcamp.png" height="120" alt="thumbnail">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{ $item->camp->title }}</strong>
                                    </p>
                                    <p>
                                        {{ $item->created_at->format('M d, Y') }}
                                    </p>
                                </td>
                                <td>
                                    <strong>${{ $item->camp->price }}</strong>
                                </td>
                                <td>
                                    @if ($item->is_paid)
                                        <strong class="text-success">Success</strong>
                                    @else
                                        <strong>Success for Payment</strong>
                                    @endif
                                </td>
                                <td>
                                    <a target="__blank" href="https://wa.me/628131231232?text=Hi, saya ingin bertanya tentang kelas {{ $item->camp->title }}" class="btn btn-primary">
                                        Contact Support
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="align-middle">
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</section>