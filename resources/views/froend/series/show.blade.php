@extends('layouts.app')

@section('content')
<div class="container">
        <section>
                <div>
                        <b-jumbotron>
                          <template v-slot:header>
                              {{ $series->title }}
                          </template>
                      
                          <template v-slot:lead>
                            {{ $series->description }}
                          </template>
                      
                          <hr class="my-4">
                      
                         
                      
                          <b-button variant="primary" href="#">Start Series</b-button>
                          <b-button variant="success" href="#">Subscribe</b-button>
                        </b-jumbotron>
                      </div>
        </section>

        <section>
                <div class="container">

                        <!-- Page Heading -->
                        <h1 class="my-4">Episodes
                          <small>20</small>
                        </h1>
                        
                        <episodes :videos="{{$series->videos}}"></episodes>
                  
                        
                  
                      </div>
        </section>
      
        <section class="mt-3">
            <pricing></pricing>
        </section>
    </div>
@endsection