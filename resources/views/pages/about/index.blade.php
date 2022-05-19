@extends('layouts.master')

@section('content')
    <style>
        
    </style>
    <section class="blog pt-3 pb-3">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <h4> {{ $data->tieuDe }}</h4>
                    <hr>
                    <div class="wp-static-page">
                        {!! $data->noiDung !!}
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection