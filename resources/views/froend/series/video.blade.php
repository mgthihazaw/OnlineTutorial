@extends('layouts.app')

@section('content')
<div class="container">
  <section>
    <h2>Video Player</h2>
    {{-- <video width="100%" height="450" controls>
        <source src="/video/kk.mp4" type="video/mp4">
        
      Your browser does not support the video tag.
      </video> --}}
    <b-breadcrumb :items="{{ json_encode($breadCrumbs) }}"></b-breadcrumb>
    <video-player :next="{{ $nextVideoUrl }}" :video="{{ $video }}" ></video-player>
  </section>
  <section>
    <a href="#">
      <div class="card" >
          
      <div class="card-body">
      <p class="card-title">{{ $video->title }}</p>
      <p class="card-text">{{ $video->description }}</p>
      </div>
    </div>

    </a>
  </section>

  <section>
                <div class="container">

                        <!-- Page Heading -->
                        <h1 class="my-4">Episodes
                          <small>20</small>
                        </h1>
                        
                        <episodes :videos="{{ $series->videos }}"></episodes>
                        
                  
                        
                  
                      </div>
  </section>
      
        <section class="mt-3">
            <pricing></pricing>
        </section>
    </div>
@endsection