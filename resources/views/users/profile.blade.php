@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image"
    style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin: -24px 0;" id="home-section">
    <div class="container">

        <div class="container">
            @if (\Session::has('save'))
            <div class="alert alert-success">
                <p>{!! \Session::get('save') !!}</p>
            </div>
            @endif
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="{{ asset('assets/images/users/'.$profile->image.'') }}" width="100"
                            class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                        <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                        <span>{{ $profile->job_title}}</span>

                        <div class="px-4 mt-1">
                            <p class="fonts">{{ $profile->bio }}</p>

                        </div>

                        <div class="px-3 mb-2">
                            <a href="{{ asset('assets/cvs/'.$profile->cv.'') }}" target="_blank"
                                class="btn btn-success btn-block btn-lg">Download CV</a>
                        </div>

                        <div class="px-3">
                            <a href="{{ $profile->facebook }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span
                                    class="icon-facebook"></span></a>
                            <a href="{{ $profile->twitter }}" class="pt-3 pb-3 pr-3 pl-0"><span
                                    class="icon-twitter"></span></a>
                            <a href="{{ $profile->linkedin }}" class="pt-3 pb-3 pr-3 pl-0"><span
                                    class="icon-linkedin"></span></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
</section>

@endsection