@extends('master')

@section('content')
    <section class="return-process-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <form action="" method="POST" class="return-process-form form-group" enctype="multipart/form-data">
                        <div class="text-center">
                            <h3 class="return-process-form-title">Contact Us</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item-wrapper">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" value="" placeholder="Name*" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item-wrapper">
                                    <label for="phone">Phone*</label>
                                    <input type="number" name="phone" value="" placeholder="Phone*" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item-wrapper">
                                    <label for="phone">Email (Optional)</label>
                                    <input type="email" name="email" value="" placeholder="Email*" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item-wrapper">
                                    <label for="address">Message</label>
                                    <textarea name="" rows="7" class="form-control" placeholder="Your Message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="return-process-btn-outer">
                            <button type="submit" id="productReturnProcess" class="return-process-btn-inner">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
