@extends('master')

@section('content')
<section class="privacy-policy-section">
            <div class="privacy-policy-heading-wrapper">
                <div class="section-heading-outer">
                    <h4 class="section-heading-inner">
                        About Us
                    </h4>
                </div>
            </div>
            <div class="container">
                <div class="privacy-policy-content">
                    <div class="contant-des">
                        {!!$termPolicy->about_us!!}
                    </div>
                </div>
            </div>
        </section>   
@endsection