@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <br><br>
                    {{\Illuminate\Support\Facades\Auth::user()->phone}}
                        <br><br>
                        {{\Illuminate\Support\Facades\Auth::user()->address}}
                        <br><br>
                        <button class="btn btn-primary test-toast">click</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('foot')
    <script>
        $('.test-toast').click(function (){
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'hi'
            })
        })
    </script>
@endsection
