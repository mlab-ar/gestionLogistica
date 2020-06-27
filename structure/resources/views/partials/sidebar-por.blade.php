<div class="large-4 columns padding-right-remove">
    <aside class="secBg sidebar">
        <div class="row">

            <div class="large-12 medium-7 medium-centered columns">
                <div class="widgetBox">
                    <div class="widgetTitle">
                        <h5>Procurar Videos</h5>
                    </div>
                    <form action="{{route('por.videos-buscar')}}" method="get">
                        <div class="input-group">
                            <input class="input-group-field" name="buscar" id="search" type="text" placeholder="Digite e pressionar enter" required>
                            <div class="input-group-button">
                                <input style="height:41px" type="submit" class="button" value="PROCURAR">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div  class="large-12 medium-7 medium-centered columns">
                <div class="widgetBox">
                    <div class="widgetTitle">
                        <h5>VIDEOS MAIS VISUALIZADOS</h5>
                    </div>
                    <div class="widgetContent">
                        @foreach(App\Video::where('activo','SI')->orderBy('views', 'DESC')->take(3)->get() as $destacado)
                        <div class="video-box thumb-border">
                            <div class="video-img-thumb">
                                @if ( $destacado->photos->count() === 1)
                                  <img src="/imagendevideo/{{$destacado->photos->first()->url}}" alt="Credihub - Plataforma de Videos - Destacados - CMS Group">
                                @endif
                                @if ( $destacado->photos->count() > 1)
                                  <img src="/imagendevideo/{{$destacado->photos->first()->url}}" alt="Credihub - Plataforma de Videos - Destacados - CMS Group">
                                @endif
                                <a href="/por/video-detalle/{{$destacado->slug}}" class="hover-posts">
                                    <span><i class="fa fa-play"></i>Ver Video</span>
                                </a>
                            </div>
                            <div class="video-box-content">
                                <h6><a href="/por/video-detalle/{{$destacado->slug}}">{{$destacado->name_pb}}</a></h6>
                                <p>
                                    <span><i class="fa fa-clock-o"></i>{{$destacado->description_pb}}</span><br/>
                                    <span><i class="fa fa-youtube"></i>{{$destacado->views}} views</span>
                                </p>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>

            <div class="large-12 medium-7 medium-centered columns">
                <div class="widgetBox">
                    <div class="widgetTitle">
                        <h5 align="center">ESPAÇO PUBLICITÁRIO POR PAÍS</h5>
                    </div>
                    <div class="widgetContent">
                        <div class="advBanner text-center">
                            <a href="mailto:sebastian.rojas@cmspeople.com" target="_blank"><img src="/lay-web/images/banner-animado-credihub-por.gif" alt="Credihub - ECOSSISTEMA CMS WORLD"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="large-12 medium-7 medium-centered columns">
                <div class="widgetBox">
                    <div class="widgetTitle">
                        <h5>EVENTOS</h5>
                    </div>
                    <div class="tagcloud">
                        @foreach($subcategorias as $subcategoria)
                          @if($subcategoria->id != 0)
                            <!-- <a href="/listado-videos/{{$subcategoria->id}}">{{$subcategoria->name}}</a> -->
                            <a href="#">{{$subcategoria->name_pb}}</a>
                          @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
