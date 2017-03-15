@extends('views.layouts.master')

@section('content')
    <section class="section"
             style="background-image: url({{ assets('img/luca-bravo-217276.jpg') }}); min-height:600px;">
        <div class="container content">

            <div class="action-section">

                <a class="button is-large" href="/">
                    <span class="icon is-large">
                      <i class="fa fa-tasks"></i>
                    </span>
                    <span>Program</span>
                </a>

            </div>

            <div class="action-section">

                <a class="button is-large" href="/">
                    <span class="icon is-large">
                      <i class="fa fa-wrench"></i>
                    </span>
                    <span>Tech</span>
                </a>

            </div>

            <div class="action-section">

                <a class="button is-large" href="/">
                    <span class="icon is-large">
                      <i class="fa fa-phone"></i>
                    </span>
                    <span>Support</span>
                </a>

            </div>

        </div>
    </section>
@endsection