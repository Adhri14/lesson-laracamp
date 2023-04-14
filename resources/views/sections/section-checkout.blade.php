<section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="/assets/images/item_bootcamp.png" alt="" class="cover">
                                <h1 class="package">
                                    {{ $camp->title }}
                                </h1>
                                <p class="description">
                                    Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $camp->id) }}" method="POST" class="basic-form">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="form-label">Full Name</label>
                                    <input name="name" type="text" class="form-control" id="title" value="{{ Auth::user()->name }}" @disabled(true)>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" @disabled(true)>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label for="occupation" class="form-label">Occupation</label>
                                    <input name="occupation" type="text" class="form-control" id="occupation" value="{{ Auth::user()->occupation }}">
                                    @if ($errors->has('occupation'))
                                        <span class="text-danger">{{ $errors->first('occupation') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input name="card_number" type="number" class="form-control" id="card_number">
                                    @if ($errors->has('card_number'))
                                        <span class="text-danger">{{ $errors->first('card_number') }}</span>
                                    @endif
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="expired" class="form-label">Expired</label>
                                            <input name="expired" type="month" class="form-control" id="expired">
                                            @if ($errors->has('expired'))
                                                <span class="text-danger">{{ $errors->first('expired') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label for="cvc" class="form-label">CVC</label>
                                            <input name="cvc" type="text" class="form-control" id="cvc" maxlength="3">
                                            @if ($errors->has('cvc'))
                                                <span class="text-danger">{{ $errors->first('cvc') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="/assets/images/ic_secure.svg" alt=""> Your payment is secure and encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>