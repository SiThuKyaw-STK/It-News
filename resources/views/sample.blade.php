@extends('layouts.app')

@section('title') Sample @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="#">Sample</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample Page</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="feather-feather"></i>
                        Sample Page
                    </h4>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci blanditiis commodi cum dolore ea enim et excepturi, libero magni minima molestias, nemo perspiciatis possimus quam quasi saepe, soluta ullam.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
