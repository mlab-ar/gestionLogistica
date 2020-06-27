@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <section class="error-page">
        <div class="row secBg">
            <div class="large-8 large-centered columns">
                <div class="error-page-content text-center">
                    <div class="error-img text-center">
                        <img src="/lay-web/images/404-error.png" alt="404 page">
                        <div class="spark">
                            <img class="flash" src="/lay-web/images/spark.png" alt="spark">
                        </div>
                    </div>
                    <br/>
                    <h1>NOT FOUND!</h1>
                    <!-- <p>No estas autorizado para acceder a la ruta que estas intentando. Cualquier inconveniente consultanos por nuestro contacto. Disculpa las molestias.</p> -->
                    <br/>
                    <a href="/" class="btn btn-primary" style="border-color:#F08219;background-color:#F08219">Volver a la plataforma</a>
                </div>
            </div>
        </div>
    </section>
  </div>
</div>
@endsection
