@extends('dashboard-app')


@section('content')

    <div class="row">
        <div class="large-12 columns"><p><i>version .0.1</i></p></div>
    </div>

    <div class="row">

        <div class="large-12 columns">
            <h5>Examples: <span><a href="#" onclick="$('#examples').toggle();">show/hide</a></span></h5>
            <div id="examples">
                <ul>
                    <li><strong>Meta Title</strong>: <i>Elan Uptown - Minneapolis, MN Apartments</i></li>
                    <li><strong>Meta Description</strong>: <i>Be the Envy of Uptown.  Experience the art of fine living, where Elan Uptown brings sophistication and elegance to the heart of Minneapolis.</i></li>
                    <li><strong>Image Name:</strong> <i>elan-uptown-minneapolis-mn-apartments-1</i></li>
                    <li><strong>Image Alt:</strong> <i>elan uptown swimming pool</i></li>
                </ul>
            </div>
        </div>
    </div>
<hr>

    <form method="post" action="/dashboard/meta/post-update">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="property_id" value="{{$property->property_id}}"/>
        <div class="row">
            <div class="large-6 columns">
                <div class="row">
                    <div class="medium-12 columns"><strong>{{$property->headline}}</strong></div>
                </div>
                <div class="row">
                    <div class="medium-12 columns"><strong>{{$address->city}}, {{$address->state}}</strong></div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">{!!$property->gendesc!!}</div>
                </div>

            </div>
            <div class="large-6 columns">
                <div class="row">
                    <div class="large-12 columns">
                        <label>Meta Title
                            <input type="text" name="meta-title" placeholder="Meta Title" value="{!!$property->metatitle!!}" />
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <label>Meta Description
                            <input type="text" name="meta-description" placeholder="Minneapolis mn apartments, Etc" value="{!!$property->metadescription!!}" />
                        </label>
                    </div>
                </div>
            </div>
        </div>
<hr/>
        <div class="row">
            <div class="large-12 columns">
                <ul class="small-block-grid-3 medium-block-grid-6 large-block-grid-12">
                    @foreach($images as $image)
                       <li>
                           <img class="th" src="{{$img_url}}gallery_thumb/{{$image->imgname}}.jpg" data-imgname="{{$image->imgname}}" data-id="{{$image->image_id}}"/>
                           <input type="hidden" value="{{$image->cleanimagename}}" name="cleanimagename[{{$image->image_id}}]"/>
                           <input type="hidden" value="{{$image->imgalt}}" name="imgalt[{{$image->image_id}}]"/>
                           <div data-alert class="alert-box success radius alert-{{$image->image_id}}" style="display:none">
                              saved
                               <a href="#" class="close">&times;</a>
                           </div>
                       </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div id="editDiv">
        <div class="row">
            <div class="large-12 columns">
                <h3>Edit image name and alt tag</h3>
            </div>
        </div>
        <div class="row">
            <div class="large-4 columns">
                <img src="http://placehold.it/350x150" id="updateImage">
                <input type="hidden" value="" id="updateImageInfo"/>
            </div>
            <div class="large-8 columns">
                <div class="row">
                    <div class="large-12 columns">
                        <label><strong>Image Name</strong>
                            <input id="updateName" value="" type="text" placeholder="clean-name"/>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <label><strong>Alt Tag</strong>
                            <input id="updateAlt" value="" type="text" placeholder="image alt tag"/>
                        </label>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="large-12 large-push-11 columns">
                <a href="#" class="button small" id="addImageValues">Add</a>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="large-12 large-push-10  columns">
                <input type="submit" value="Save ALL Changes" class="button alert" />
            </div>
        </div>
    </form>

@stop

@section('footer-scripts')
    <script>
        $(document).ready(function(){

            $('#editDiv').hide();

            $('li').on('click',function(){
                $('#')

                var nodes = $(this).children(),
                    image = $(nodes[0]).data('imgname') + '.jpg',
                    clean = $(nodes[1]).val(),
                    alt   = $(nodes[2]).val(),
                    image_id = $(nodes[0]).data('id');

                $('#updateImage').attr({src:'http://d14d0ey1pb5ifb.cloudfront.net/thumb/'+ image});
                $('#updateAlt').val(alt);
                $('#updateName').val(clean);

                $('#updateImageInfo').val(image_id);

                $('#editDiv').show();
            });


            $('#addImageValues').bind('click', function(e){
                //imgalt[]
                //cleanimagename[]

                var new_alt = $('#updateAlt').val(),
                    new_cleanimagename = $('#updateName').val(),
                    image_id = $('#updateImageInfo').val();


                $('input[name="imgalt[' + image_id + ']"]').val(new_alt);
                $('input[name="cleanimagename[' + image_id + ']"]').val(new_cleanimagename);

                $('.alert-'+ image_id).show();
                e.preventDefault();

            });

        });
    </script>
@stop