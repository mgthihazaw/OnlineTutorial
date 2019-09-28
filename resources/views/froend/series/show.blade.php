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
                        
                        @foreach($series->videos as $data)
                        <div class="row">
                            <div class="col-md-1">
                                {{$data->id}}
                            </div>
                          <div class="col-md-4">
                            <a href="#">
                              <img class="img-fluid rounded mb-3 mb-md-0" src="data:image/png;base64,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" alt="">
                            </a>
                          </div>
                          <div class="col-md-7">
                        
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                            
                          </div>
                        </div>
                        <!-- /.row -->
                  
                        <hr>
                  
                      @endforeach
                  
                        
                  
                      </div>
        </section>
      
        <section class="mt-3">
            <pricing></pricing>
        </section>
    </div>
@endsection