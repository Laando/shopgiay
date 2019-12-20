@extends('layout')
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif @foreach($all_lienhe as $key => $lienhe)
<div id="contact-page" class="container">
    <div class="bg">

        <div class="row">
            <div class="contact-info">
                <h2 class="title text-center">Contact Info</h2>
                <p>{!! $lienhe->lienhe_noidung !!}</p>
                <a href="{{URL::to($lienhe->lienhe_link)}}">{{$lienhe->lienhe_link}}</a>

            </div>
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.120335131211!2d106.71239465051528!3d10.802094592266348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a459cb43ab%3A0x6c3d29d370b52a7e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBIdXRlY2g!5e0!3m2!1svi!2s!4v1572353653036!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection